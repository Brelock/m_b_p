<template>

    <div class="row">
        <!--<div class="col-sm-12">-->
        <!--<h4>Статусы</h4>-->
        <!--</div>-->
        <!--<div class="col-sm-12">-->
        <!--<div class="form-check form-check-inline" v-for="(status, index) in statuses">-->
        <!--<input class="form-check-input" type="checkbox" :id="'inlineCheckbox'+ status.id" v-on:change="onChangeActive(status)" :checked="status.active">-->
        <!--<label class="form-check-label" :for="'inlineCheckbox'+ status.id">{{ status.title_ru}}</label>&nbsp;&nbsp;-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="col-sm-12">-->
        <!--<div class="form-check form-check-inline" v-for="(activStatus, index) in activeStatuses">-->
        <!--<input class="form-check-input" type="checkbox" >-->
        <!--<label class="form-check-label" >{{ activStatus.title_ru}} {{ activStatus.active}}</label>&nbsp;&nbsp;-->
        <!--</div>-->
        <!--</div>-->
        <hr>
        <div class="col-sm-12">
            <h4>Расценки за грамм металлов</h4>
        </div>

        <hr>

        <div class="col-sm-12">
            <div v-if="statusesNumber" class="form-group">
                <table class="" id="ratesTable">
                    <tr>
                        <th></th>
                        <th>Проба</th>
                        <th v-for="status in statuses">
                            {{ status.title_ru }}
                        </th>
                        <th></th>
                    </tr>
                    <tr v-for="(hallmark, index) in hallmarks">
                        <td><span @click="addHallmark"  v-if="hallmarks.length === index+1"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></td>
                        <td><input type="number" class="form-control form-control-sm" name="hallmarks[]" v-model="hallmark.hallmark" required></td>

                        <td v-for="status in statuses">
                            <input v-if="create" :name="getPriceNames(hallmark.hallmark, status.id)" type="number" class="form-control form-control-sm" placeholder="цена за гр" min="0.01" step="0.01" required>
                            <!--<input v-else :name="getPriceNames(hallmark.hallmark, status.id)" @click="getIndex(hallmark.id, status.id)" v-model="prices[0].value" type="number" class="form-control" placeholder="цена за гр" min="0.01" step="0.01" required>-->
                            <input v-else :name="getPriceNames(hallmark.hallmark, status.id)" v-model="prices[getIndex(index, status.id)].value" type="text" class="form-control form-control-sm" required>
                        </td>
                        <td><span @click="removeHallmark(index)" v-if="index !== 0"><i class="fa fa-trash" aria-hidden="true"></i></span></td>
                    </tr>
                </table>

            </div>
            <div v-else>Статусы пользователей не загружены</div>
        </div>
    </div>
</template>

<script>

    export default {

        data(){
            return {
                // statuses: [],
                hallmarks: [{hallmark: ''}],
                show: false,
                prices: [],
                create: true,
                notActiveStatuses: []
            }
        },
        props: ['tariff', 'status', 'all_statuses', 'notactivestatuses'],

        mounted() {

            if (this.tariff){
                this.hallmarks = this.tariff.hallmarks;
                this.prices = this.tariff.prices;
                this.create = false;

                this.notActiveStatuses = this.notactivestatuses;

                for (let i = 0; i < this.hallmarks.length; i++) {
                    for (let n = 0; n < this.notactivestatuses.length; n++) {

                        this.prices.push({ value: 1, calc_status_id: this.notactivestatuses[n].id, calc_hallmark_id: this.hallmarks[i].id });

                    }
                }
            }

            // this.notActiveStatuses = this.notactivestatuses;
            //
            // for (let i = 0; i < this.hallmarks.length; i++) {
            //     for (let n = 0; n < this.notactivestatuses.length; n++) {
            //
            //         this.prices.push({ value: 1, calc_status_id: this.notactivestatuses[n].id, calc_hallmark_id: this.hallmarks[i].id });
            //
            //     }
            // }
        },
        watch: {
            // эта функция запускается при любом изменении кол-ва статусов
            // statuses: function (newStatuses, oldStatuses) {
            //     for (let i = 0; i < this.hallmarks.length; i++) {
            //         for (let n = 0; n < this.notactivestatuses.length; n++) {
            //
            //             this.prices.push({ value: 1, calc_status_id: this.notactivestatuses[n].id, calc_hallmark_id: this.hallmarks[i].id });
            //         }
            //     }
            // }
        },
        computed: {
            statusesNumber() {
                return this.statuses.length;
            },
            statuses(){
                console.log(this.status);
                return this.status;
            },
            // notActiveStatuses(){
            //     console.log(this.notactivestatuses);
            //     return this.notactivestatuses;
            // }
        },

        methods: {
            addHallmark () {
                // this.create = true;
                let statuses = this.all_statuses;

                let old_hallmark_id = this.hallmarks[this.hallmarks.length - 1].id;
                this.hallmarks.push({ hallmark: '', id: ++old_hallmark_id});

                for (let i = 0; i < statuses.length; i++) {
                    let value = this.all_statuses[i].id;
                    this.prices.push({ value: 1, calc_status_id: value, calc_hallmark_id: old_hallmark_id });
                }

            },
            removeHallmark (index) {
                this.removePrices(index);
                this.hallmarks.splice(index, 1);
            },
            removePrices(hallmarkIndex) {
                let hallmarks = this.hallmarks;
                var _this = this;

                _.remove(_this.prices , function (item) {
                    return item.calc_hallmark_id === _this.hallmarks[hallmarkIndex].id;
                });
            },
            getPriceNames(hallmark, statusId) {
                return 'prices' + '[' + hallmark + ']' + '[' + statusId + '][]';
            },
            getPrice (hallmarkId, statusId) {
                let prices = this.prices;

                for (let i = 0; i < prices.length; i++) {
                    if (prices[i].calc_hallmark_id == parseInt(hallmarkId) && prices[i].calc_status_id == parseInt(statusId)){
                        return prices[i].value;
                    }
                }
            },
            getIndex (hallmarkIndex, statusId){

                let prices = this.prices;

                for (let i = 0; i < prices.length; i++) {
                    if (prices[i].calc_hallmark_id == this.hallmarks[hallmarkIndex].id && prices[i].calc_status_id == statusId){
                        // if (prices[i].calc_hallmark_id === this.hallmarks[hallmarkIndex].id && prices[i].calc_status_id === statusId){
                        return i;
                    }
                }
                return false;

            },
        }
    }
</script>

<style>
    .fa-plus-circle {
        color: green;
    }
    .fa-trash {
        color: red;
    }
</style>