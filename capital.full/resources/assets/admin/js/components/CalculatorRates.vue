<template>

    <div class="row">
        <div class="col-sm-12">
            <h4>Ставки</h4>
        </div>
        <div class="col-sm-3">
            <h5>Максимальные суммы</h5>
            <form>
                <div class="form-group">
                    <table>
                        <tr>
                            <td></td>
                            <td>До </td>
                            <td></td>
                        </tr>
                        <tr  v-for="(maxAmount, index) in maxAmounts">
                            <td><span @click="addMaxAmount"  v-if="maxAmounts.length === index+1"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></td>
                            <td><input type="text" class="form-control form-control-sm" placeholder="до" v-model="maxAmount.value" required></td>
                            <td><span @click="removeMaxAmount(index)" v-if="index !== 0"><i class="fa fa-trash" aria-hidden="true"></i></span></td>

                        </tr>
                    </table>
                </div>
            </form>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
            <h5>Сроки залога <small>(дней)</small></h5>
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
                        <tr v-for="(term, index) in terms">
                            <td><span @click="addTerm"  v-if="terms.length === index+1"><i class="fa fa-plus-circle" aria-hidden="true"></i></span></td>
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
                            <td><span @click="removeTerm(index)" v-if="index !== 0"><i class="fa fa-trash" aria-hidden="true"></i></span></td>

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
        <div class="col-sm-3"></div>
        <div class="col-sm-12">&nbsp;</div>
        <div class="col-sm-12">
            <div v-if="statusesNumber" class="form-group">
                <table class="" id="ratesTable">
                    <tr>
                        <th>Сумма</th>
                        <th v-for="status in statuses">
                            {{ status.title_ru }}
                        </th>
                    </tr>
                    <tr>
                        <td></td>
                        <td v-for="status in statuses">
                            <table>
                                <tr class="terms-row">
                                    <td v-for="(term, index) in terms" class="term-column">
                                        <div class="form-row">
                                            <div class="col">
                                                <!--<input v-for="termProp in term" :value="termProp" name="term[1][]" type="text" class="form-control" placeholder="">-->
                                                <input :value="getTermValue(term)" type="text" class="form-control form-control-sm" placeholder="от - до" disabled>
                                                <!--<input v-model="terms[index]" name="term[1][]" type="text" class="form-control" placeholder="от - до">-->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr v-for="(maxAmount, amount) in maxAmounts">
                        <td><input type="number" class="form-control form-control-sm" placeholder="введите сумму" name="max_amount[]" v-model="maxAmount.value" disabled></td>

                        <td v-for="status in statuses">
                            <table>
                                <tr>
                                    <td v-for="(term, index) in terms">
                                        <div class="form-row">
                                            <div class="col">
                                                <input v-if="create" :name="getRateNames(maxAmount.value, status.id, getTermValue(term))" min="0.001" step="0.001" type="number" class="form-control form-control-sm" required>
                                                <input v-else :name="getRateNames(maxAmount.value, status.id, getTermValue(term))" v-model="rates[getIndex(index, amount, status.id)].value" min="0.001" step="0.001" type="number" class="form-control form-control-sm" required>
                                                <!--<input v-else :name="getRateNames(maxAmount.value, status.id, getTermValue(term))" :value="getRate(maxAmount.id, status.id, term.id)" min="0.001" step="0.001" type="number" class="form-control" placeholder="ставка" required>-->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
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
                maxAmounts: [{
                    value: '',
                }],
                terms: [{
                    from: '',
                    to: ''
                }],
                show: false,
                rates: [],
                create: true,
                notActiveStatuses: []
            }
        },
        props: ['tariff', 'status', 'all_statuses', 'notactivestatuses'],
        mounted() {

            if (this.tariff){
                this.terms = this.tariff.terms;
                this.maxAmounts = this.tariff.max_amounts;
                this.rates = this.tariff.rates;
                this.create = false;

                this.notActiveStatuses = this.notactivestatuses;

                for (let z = 0; z < this.maxAmounts.length; z++) {
                    for (let i = 0; i < this.notActiveStatuses.length; i++) {
                        let value = this.notActiveStatuses[i].id;
                        for (let y = 0; y < this.terms.length; y++) {
                            this.rates.push({ value: 0, calc_status_id: value, calc_max_amount_id: this.maxAmounts[z].id, calc_term_id: this.terms[y].id });
                        }
                    }
                }
            }
        },
        computed: {
            statusesNumber() {
                return this.statuses.length;
            },
            statuses(){
                return this.status;
            },
        },
        methods: {
            addTerm () {

                let oldTermId = this.terms[this.terms.length - 1].id;
                this.terms.push({
                    from: '',
                    to: '',
                    id: ++oldTermId
                });
                for (let i = 0; i < this.all_statuses.length; i++) {
                    let value = this.all_statuses[i].id;
                    for (let y = 0; y < this.maxAmounts.length; y++) {
                        this.rates.push({ value: 0, calc_status_id: value, calc_max_amount_id: this.maxAmounts[y].id, calc_term_id: oldTermId });
                    }
                }
            },
            removeTerm (index) {
                this.removeRatesWithTerm(index);
                this.terms.splice(index, 1);
            },
            addMaxAmount () {
                let oldMaxAmountId = this.maxAmounts[this.maxAmounts.length - 1].id;
                this.maxAmounts.push({ value: '', id: ++oldMaxAmountId});
                for (let i = 0; i < this.all_statuses.length; i++) {
                    let value = this.all_statuses[i].id;
                    for (let y = 0; y < this.terms.length; y++) {
                        this.rates.push({ value: 0, calc_status_id: value, calc_max_amount_id: oldMaxAmountId, calc_term_id: this.terms[y].id });
                    }
                }
            },
            removeMaxAmount (index) {
                this.removeRatesWithAmount(index);
                this.maxAmounts.splice(index, 1);
            },
            removeRatesWithAmount(maxAmountIndex) {

                let _this = this;

                _.remove(_this.rates , function (item) {
                    return item.calc_max_amount_id === _this.maxAmounts[maxAmountIndex].id;
                });
            },
            removeRatesWithTerm(termIndex) {

                let _this = this;

                _.remove(_this.rates , function (item) {
                    return item.calc_term_id === _this.terms[termIndex].id;
                });
            },
            getRateNames(amount, statusId, term) {
                let string = 'rates' + '[' + amount + ']' + '[' + statusId + ']' + '[' + term + '][]';
                return string;
            },
            getTermValue(term) {
                return '' + term.from + ' - ' + term.to;
            },
            getRate (amountId, statusId, termId) {
                let rates = this.rates;
                for (let i = 0; i < rates.length; i++) {
                    if (rates[i].calc_max_amount_id === parseInt(amountId) && rates[i].calc_status_id === parseInt(statusId) && rates[i].calc_term_id === parseInt(termId)){
                        return rates[i].value;
                    }
                }
            },
            getIndex (termIndex, maxAmountIndex, statusId){

                let rates = this.rates;

                for (let i = 0; i < rates.length; i++) {
                    if (rates[i].calc_term_id == this.terms[termIndex].id && rates[i].calc_max_amount_id == this.maxAmounts[maxAmountIndex].id && rates[i].calc_status_id == statusId){
                        return i;
                    }
                }
                return false;
            },
        }
    }
</script>
