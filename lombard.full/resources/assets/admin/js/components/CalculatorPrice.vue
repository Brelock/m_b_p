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
            <h2>Расценки за грамм металлов</h2>
        </div>

        <hr>

        <div class="col-sm-6">
            <h4>Расценки за грамм Золото</h4>
            <div class="form-group">
                <table class="" id="ratesTableGold">
                    <tr>
                        <th><span @click="addHallmarkGold"  v-if="gold.length === 0"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></th>
                        <th>Проба</th>
                        <th>Лом</th>
                        <th>Под залог</th>
                        <th></th>
                    </tr>
                    <tr v-for="(hallmark, index) in gold">
                        <td><span @click="addHallmarkGold"  v-if="gold.length === index+1"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></td>
                        <td><input type="number" class="form-control form-control-sm" :name="'hallmarks[gold]['+ index +'][hallmark]'" v-model="hallmark.hallmark" required></td>

                        <td><input type="number" class="form-control form-control-sm" :name="'hallmarks[gold]['+ index +'][lom]'" v-model="hallmark.lom" placeholder="цена за гр" min="0.01" step="0.01" required></td>
                        <td><input type="number" class="form-control form-control-sm" :name="'hallmarks[gold]['+ index +'][zalog]'" v-model="hallmark.zalog" placeholder="цена за гр" min="0.01" step="0.01" required></td>
                        <td><span @click="removeHallmarkGold(index)" v-if="index !== 0"><i class="fa fa-trash" aria-hidden="true"></i></span></td>
                    </tr>
                </table>

            </div>
        </div>
        <div class="col-sm-6">
            <h4>Расценки за грамм Серебро</h4>
            <div class="form-group">
                <table class="" id="ratesTableSilver">
                    <tr>
                        <th><span @click="addHallmarkSilver"  v-if="silver.length === 0"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></th>
                        <th>Проба</th>
                        <th>Лом</th>
                        <th>Под залог</th>
                        <th></th>
                    </tr>
                    <tr v-for="(hallmark, index) in silver">
                        <td><span @click="addHallmarkSilver"  v-if="silver.length === index+1"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></td>
                        <td><input type="number" class="form-control form-control-sm" :name="'hallmarks[silver]['+ index +'][hallmark]'" v-model="hallmark.hallmark" required></td>

                        <td><input type="number" class="form-control form-control-sm" :name="'hallmarks[silver]['+ index +'][lom]'" v-model="hallmark.lom" placeholder="цена за гр" min="0.01" step="0.01" required></td>
                        <td><input type="number" class="form-control form-control-sm" :name="'hallmarks[silver]['+ index +'][zalog]'" v-model="hallmark.zalog" placeholder="цена за гр" min="0.01" step="0.01" required></td>
                        <td><span @click="removeHallmarkSilver(index)" v-if="index !== 0"><i class="fa fa-trash" aria-hidden="true"></i></span></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data(){
            return {
                gold: [],
                silver: [],
            }
        },
        props: ['hallmarks'],
        mounted() {
            for (let z = 0; z < this.hallmarks.length; z++) {
                if(this.hallmarks[z].calc_category_id == 1)
                {
                    this.gold.push(this.hallmarks[z]);
                }
                else
                {
                    this.silver.push(this.hallmarks[z]);
                }

            }

        },

        methods: {
            addHallmarkGold () {
                let old_hallmark_id = 0;
                if(this.gold.length > 0 )
                {
                    let old_hallmark_id = this.gold[this.gold.length - 1].id;
                }

                this.gold.push({ hallmark: '',lom:'', zalog:'', calc_category_id:1, id: ++old_hallmark_id});

            },
            addHallmarkSilver () {
                let old_hallmark_id = 0;
                if(this.silver.length > 0 ) {
                    let old_hallmark_id = this.silver[this.silver.length - 1].id;
                }

                this.silver.push({ hallmark: '',lom:'', zalog:'', calc_category_id:2, id: ++old_hallmark_id});

            },
            removeHallmarkGold (index) {
                this.gold.splice(index, 1);
            },
            removeHallmarkSilver (index) {
                this.silver.splice(index, 1);
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