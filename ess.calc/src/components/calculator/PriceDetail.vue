<template>
<div class='price-list-table'>
    <div class='price-list-table__title'>Цена решения "под ключ" - 
      <span>${{total_price|numeral('0,0')}}</span>
      <!-- <transition name='fade' in-out>
        <b-badge v-if='!showPriceInfo' @click="showPriceInfo = !showPriceInfo" variant="info" pill class='info-badge'>
          info
        </b-badge>
      </transition> -->
    </div>

    <div class="wrap-form-btn flex">
      <button class="fotm-btn-booking" @click="proceedRequest">Заказать</button>
      <button class="form-btn-print" id="submit-print" @click="printPriceDetail"></button>
    </div>

    <!-- <b-collapse id="calculate_detail" v-model='showPriceInfo'> -->
      <div class="minor-abstracts">
        <div class="bref-item"> Срок окупаемости (лет) <span>{{payback_duration}}</span></div>
        <div class="bref-item"> Занимаемая панелями площадь - <span> {{this.square}} кв. м</span></div>
        <div class="bref-item"> Мощность фотополя - <span>{{totalPanelsPower}} кВт</span></div>
      </div>

      <div class="table-block">
        <b-table 
          responsive 
          id='price-detail-table' 
          :items="items" 
          :fields="fields"
          bordered
        >
          <template #table-caption>
            *В комплект поставки солнечной электростанции не входит 
            доставка оборудования на объект и дополнительные материалы: 
            солнечный провод и провод переменного тока 
            (считаются по факту расхода).  
          </template>

          <template #cell(count)="data" >
            <div v-if='data.item.type === "Солнечные панели"' class='row flex center spaceAround quantity-cell'>
              <button @click='removePanel' type="button" :class="{'disabled-icon': isMinusDisabled, 'btn-minus': true}"></button>
              <div class='m-inline'>
                {{data.item.count}}
              </div>
              <button @click='addPanel' type="button" class="btn-plus"></button>
            </div>
            <div v-else>
              {{data.item.count}}
            </div>
          </template>

          <template slot="name" slot-scope="data">
            <div v-if='itemUrl(data.item)'>
              <a target="_blank" :href="itemUrl(data.item)">{{data.item.name}}</a>
            </div>
            <div v-else>
              {{data.item.name}}
            </div>
          </template>

        </b-table>
      </div>
      
      <!-- <b-row>
        <b-col>
          <b-button size="sm" variant='info' @click="showPriceInfo = !showPriceInfo" class="mx-3 my-3 noprint">Скрыть детали</b-button>
        </b-col>
      </b-row> -->
    <!-- </b-collapse> -->
</div>
</template>

<script>
const type_inv = 'Инвертор'
const type_solar_panel = 'Солнечные панели'
const type_defence = 'Защита'
const type_construction = 'Конструкция'
const type_work = 'Монтажные работы'
const type_electric_meter = 'Электрический счетчик'

import jsPDF from 'jspdf'

export default {
  name: 'PriceDetail',
  data(){
    return{
      // showPriceInfo : true,
      stantion_power : this.$store.state.selected_stantion.power,
      total_price : 0,
      square : 0,
      panel_count : 0,
      fields: [
          { key: 'type', label: '', class: 'text-left' },
          { key: 'name', label: 'Наименование'},
          { key: 'power', label: 'Мощность, кВт' },
          { key: 'count', label: 'Кол-во',  sortable: true},
          { key: 'price_single', label: 'Цена за шт., $',  sortable: true},
          { key: 'price_total', label: 'Общая цена, $',  sortable: true}
        ],
    }
  },
  methods : {
    proceedRequest(){
      this.$store.dispatch('panel_count', this.panel_count)
      this.$router.push({'path' : '/cart'})
    },
    printPriceDetail(){
      window.print()
    },
    addPanel(){
      this.panel_count += 1
    },
    removePanel(){
        if (!this.isMinusDisabled){
          this.panel_count -= 1
        }
    },
    itemUrl(item){
       if ("Солнечные панели" === item.type){
          return this.p.url ? this.p.url : undefined
       } else if ("Инвертор" === item.type ){
          return this.i.url ? this.i.url : undefined
       }
       return undefined
    }
  },
  watch: {
    p(new_val, old_val){
      if (new_val != old_val){
        this.panel_count = this.orig_panel_count
      }
    },
    i(new_val, old_val){
      if (new_val.power != old_val.power){
        this.panel_count = this.orig_panel_count
      }
    },
  },
  computed :{
    isMinusDisabled(){
      const is_m_disabled = (this.panel_count == 10)
      return is_m_disabled
    },
    orig_panel_count(){
      return this.i && this.p ? Math.ceil(this.i.power / this.p.power) : 0
    },
    d(){
      return this.$store.state.defences.filter(item => item.power == this.stantion_power)[0]
    },
    e(){
      return this.$store.state.electric_meters.filter(item => item.power == this.stantion_power)[0]
    },
    i(){
      return this.$store.state.selected_inventor
    },
    p(){
      return this.$store.state.selected_panel
    },
    c(){
      return this.$store.state.selected_construction
    },
    items(){
      let items = []
      this.panel_count = this.panel_count === 0 ? this.orig_panel_count : this.panel_count
      let montage_price = Math.ceil((this.i.power / 1000) * 20 + (this.p.power * this.panel_count * 60 / 1000))
      items.push({type : type_inv, name : this.i.name, power : this.i.power / 1000, count : 1, price_single : this.i.price, price_total : this.i.price})
      items.push({type : type_solar_panel, name : this.p.name, power : this.p.power / 1000, count : this.panel_count, price_single : this.p.price, price_total : Math.ceil(this.p.price * this.panel_count)})
      if (this.d){
        items.push({type : type_defence, name : this.d.name, power : `${this.stantion_power/1000}кВт`, count : 1, price_single : this.d.price, price_total : this.d.price})
      }
      if (this.e){
        items.push({type : type_electric_meter, name : this.e.name, power : `${this.stantion_power/1000}кВт`, count : 1, price_single : this.e.price, price_total : this.e.price})
      }
      items.push({type : type_construction, name : this.c.name, power : '-', count : this.panel_count, price_single : this.c.price, price_total : this.c.price * this.panel_count})
      items.push({type : type_work, name : '-', power : '-', count : '-', price_single : '-', price_total : montage_price})

      this.total_price = Math.ceil(this.i.price + (this.d ? this.d.price : 0) + this.panel_count * (this.c.price + this.p.price) + montage_price + this.e.price)
      this.square = Math.ceil(this.panel_count * (this.p.size.h / 1000) * (this.p.size.w / 1000))
      return items
    },
    payback_duration(){

      // мощность панелей (общ) *1,15= сумма * 0,18= сумма -19,5%= ЦЕНА СЭС под ключ / на сумму полученную из "сумма -19,5%"

      const x = this.panel_count * this.p.power * 1.15 * 0.18
      const y = Math.round(x - (x * 0.195))
      const z = Math.round((this.total_price / y) * 100)
      return z / 100
    },
    totalPanelsPower(){
      return Math.round(this.p.power * this.panel_count / 1000)
    }
  },
}
</script>

<style scoped>
.info-badge{
  font-size: 0.4em;
  vertical-align: top;
  margin-top: -0.5em!important;
  cursor: pointer;
}
table a {
  color: black;
  text-decoration: underline;
}

.icon {
position: relative;
width:16px;
height:16px;
margin: 0 5px;
cursor: pointer;
}
.disabled-icon{
  background-color :rgb(112, 112, 112)!important;
  cursor : unset!important;
}
.icon-minus {
background-color: #000;
border-radius:8px;
-webkit-border-radius:8px;
-moz-border-radius:8px;
width: 16px;
height: 16px;
position: relative;
top:0;
left:0;

}
.icon-minus:after {
background-color: #fff;
width: 8px;
height: 2px;
border-radius: 1px;
-webkit-border-radius: 1px;
-moz-border-radius: 1px;
position: absolute;
top:7px;
left: 4px;
  z-index:4;
   content:"";
}

.icon-plus {
background-color: #000;
border-radius:8px;
-webkit-border-radius:8px;
-moz-border-radius:8px;
width: 16px;
height: 16px;
position: relative;
top:0;
left:0;
}
.icon-plus:after {
background-color: #fff;
width: 8px;
height: 2px;
border-radius: 1px;
-webkit-border-radius: 1px;
-moz-border-radius: 1px;
position: absolute;
top:7px;
left: 4px;
  content:"";
}
.icon-plus:before {
background-color: #fff;
width: 2px;
height: 8px;
border-radius: 1px;
-webkit-border-radius: 1px;
-moz-border-radius: 1px;
position: absolute;
top:4px;
left: 7px;
  content:"";
}

.m-inline{
    display: inline-block; 
}
.row {
    text-align: center;
    vertical-align: middle
}

th *{
  outline: none!important;
}

.jumbotron{
  padding: 0.5em 1em!important;
  background-color: #ffab00c4!important;
}
.m-caption{
  color:whitesmoke!important;
}



@media print{
   .noprint{
       display:none;
   }
}

</style>
