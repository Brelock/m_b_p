<template>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Статусы</h4>
            </div>
            <div class="col-sm-12">
                <div class="form-check form-check-inline" v-for="(status, index) in statuses">
                    <input class="form-check-input" type="checkbox" :id="'inlineCheckbox'+ status.id" v-on:change="onChangeActive(status)" :checked="status.active">
                    <label class="form-check-label" :for="'inlineCheckbox'+ status.id">{{ status.title_ru}}</label>&nbsp;&nbsp;
                </div>
                <template v-for="status in activeStatuses">
                    <input type="hidden" name="statuses[]" :value="status.id">
                </template>
            </div>
        </div>
        <hr>

        <calculator-price :notactivestatuses="not_active_statuses" :all_statuses="allstatuses" :status="activeStatuses" :tariff="tariff"></calculator-price>
        <hr>
        <calculator-rates :notactivestatuses="not_active_statuses" :all_statuses="allstatuses" :status="activeStatuses" :tariff="tariff"></calculator-rates>
    </div>
</template>

<script>

    export default {

        data(){
            return {
                statuses: [],
                activeStatuses: [],
            }
        },
        props: ['tariff', 'id', 'allstatuses', 'not_active_statuses'],

        mounted() {
            // axios.get('/admin/calculator/get-statuses')
            //     .then((response) => {
            //         this.statuses = response.data;
            //         if (this.tariff){
            //             for (let i = 0; i < this.tariff.statuses.length; i++) {
            //                 if (this.statuses[i]['id'] == this.tariff.statuses[i]['id']) {
            //                     this.statuses[i]['active'] = true;
            //                 }
            //             }
            //         } else {
            //             for (let i = 0; i < this.statuses.length; i++) {
            //                 this.statuses[i]['active'] = true;
            //             }
            //         }
            //
            //         this.filterActiveStatuses();
            //     });
            this.statuses = this.allstatuses;
            // for (let i = 0; i < this.statuses.length; i++) {
            //     this.statuses[i]['active'] = true;
            // }
            if (this.tariff){
                for (let i = 0; i < this.statuses.length; i++) {
                    if (this.tariff.statuses[i] && this.statuses[i]['id'] == this.tariff.statuses[i]['id']) {
                        this.statuses[i]['active'] = true;
                    } else {
                        this.statuses[i]['active'] = false;
                    }
                }
            } else {
                for (let i = 0; i < this.statuses.length; i++) {
                    this.statuses[i]['active'] = true;
                }
            }

            this.filterActiveStatuses();
        },

        methods: {
            filterActiveStatuses: function() {
                this.activeStatuses = _.filter(this.statuses, function (status) {
                    return status.active;
                });
            },
            onChangeActive: function(status) {
                status.active = !status.active;
                this.filterActiveStatuses();
            },

        }
    }
</script>