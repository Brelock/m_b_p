<script>
    export default {
        props: ['attributes'],

        data(){
            return {
                image: this.attributes
            };
        },

        methods: {
            destroy(){
                var _this = this;
                axios.delete('/admin/reports/certificate/' + this.attributes.id).then(function(response){

                    if (response.data.class == 'success'){
                        $(_this.$el).fadeOut(400);
                        window.flash(response.data.message, response.data.class);
                    }
                });
            },

        }
    }
</script>