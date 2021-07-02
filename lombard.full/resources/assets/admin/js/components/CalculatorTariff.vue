<template>
    <div>
        <calculator-rates :tariff="tariff" :categories="categories"></calculator-rates>
    </div>
</template>

<script>

    export default {


        props: ['tariff', 'id','categories'],

        mounted() {

        },

        methods: {

        }
    }
</script>