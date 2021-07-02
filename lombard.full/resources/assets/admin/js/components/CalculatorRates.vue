<template>

    <div class="row">
        <div class="col-sm-12">
            <h4>Ставки</h4>
        </div>
            <div class="col-sm-6" v-for="category in categories">
                <h5>Сроки залога <small>(дней)</small> {{category.title_ru}}</h5>
                <form>
                    <div class="form-group">
                        <table>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="form-row">
                                        <div class="col">От</div>
                                        <div class="col">До</div>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr v-for="(term, index) in terms" v-if="term.calc_category_id == category.id">
                                <td><span @click="addTerm(category.id)"  v-if="maxId(category.id) === term.id"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></td>
                                <!--<cleave placeholder="от - до" :options="{ delimiter: ' - ', blocks: [2, 2] }"  class="form-control" v-model="terms[index]"></cleave>-->
                                <td>
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="number" class="form-control form-control-sm" placeholder="от" v-model="term.from" required>
                                        </div>
                                        <div class="col">
                                            <input type="number" class="form-control form-control-sm" placeholder="до" v-model="term.to" required>
                                        </div>
                                    </div>
                                </td>
                                <td><span @click="removeTerm(index)" v-if="term.id !== minId(category.id)"><i class="fa fa-trash" aria-hidden="true"></i></span></td>

                            </tr>
                            <tr v-if="!maxId(category.id)">
                                <td><span @click="addTerm(category.id)"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></td>
                            </tr>
                        </table>
                    </div>

                    <!--<div class="form-row col-sm-4" v-for="(term, index) in terms">-->
                    <!--<div class="col" v-if="terms.length == index+1">-->
                    <!--<span @click="addTerm"><i class="fa fa-trash" aria-hidden="true"></i></span>-->
                    <!--</div>-->
                    <!--<div class="col">-->
                    <!--<input type="text" class="form-control" placeholder="от" v-model="terms[index]">-->
                    <!--</div>-->
                    <!--<div class="col">-->
                    <!--&lt;!&ndash;<input type="number" class="form-control" placeholder="до">&ndash;&gt;-->
                    <!--<span @click="removeTerm"><i class="fa fa-trash" aria-hidden="true"></i></span>-->
                    <!--</div>-->
                    <!--</div>-->
                </form>
            </div>
            <div class="col-sm-6" v-for="category in categories">
                <div class="form-group">
                    <table class="" id="ratesTable">
                        <tr>
                            <th>Процент (1 = 100%)</th>
                            <th></th>
                        </tr>
                        <tr>
                                        <td v-for="(term, index) in terms" v-if="term.calc_category_id == category.id" class="term-column">
                                            <div class="form-row">
                                                <div class="col">
                                                    <!--<input v-for="termProp in term" :value="termProp" name="term[1][]" type="text" class="form-control" placeholder="">-->
                                                    <input :value="getTermValue(term)" type="text" class="form-control form-control-sm" placeholder="от - до" disabled>
                                                    <!--<input v-model="terms[index]" name="term[1][]" type="text" class="form-control" placeholder="от - до">-->
                                                </div>
                                            </div>
                                        </td>

                        </tr>
                        <tr>

                                        <td v-for="(term, index) in terms" v-if="term.calc_category_id == category.id">
                                            <div class="form-row">
                                                <div class="col">
                                                    <input :name="getTermNames(getTermValue(term),index,category)" :value="getTermPrice(term)" min="0" max="100" step="0.001" type="number" class="form-control form-control-sm" required>
                                                   </div>
                                            </div>
                                        </td>
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
                // statuses: [],
                terms: [],
            }
        },
        props: ['tariff','categories'],
        mounted() {
            if (this.tariff.terms){
                this.terms = this.tariff.terms;
            }
        },
        computed: {

        },
        methods: {
            addTerm (category) {
                let oldTermId = 0;
                if(this.terms.length > 0)
                {
                    oldTermId = this.terms[this.terms.length - 1].id;
                }

                this.terms.push({
                    from: '',
                    to: '',
                    id: ++oldTermId,
                    value: 0,
                    calc_category_id: category

                });
            },

            getTermPrice(term)
            {
                return term.value;
            },
            getTermNames(term,index,category) {
                let string = 'term' + '[' + category.id + ']'+ '[' + term + '][]';
                return string;
            },
            getTermValue(term) {
                return '' + term.from + ' - ' + term.to;
            },
            removeTerm (index) {
                this.terms.splice(index, 1);
            },
            maxId(category){
                let max = 0;
                $.each(this.terms, function(key, value) {
                    if(value.calc_category_id == category){
                        if (value.id > max) {
                            max = value.id;
                        }
                    }
                });
                return max
            },
            minId(category){
                let min = 0;
                if(this.maxId(category))
                {
                    min = this.maxId(category);
                }

                $.each(this.terms, function(key, value) {
                    if(value.calc_category_id == category){
                        if (value.id < min) {
                            min = value.id;
                        }
                    }
                });
                return min
            }
        }
    }
</script>
