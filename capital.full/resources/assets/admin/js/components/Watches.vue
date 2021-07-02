<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название бренда</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        </thead>

        <tbody>
        <tr v-for="watch in watches" :id="watch.id">
            <td>
                <div v-if="watch.editing">
                    <div class="form-group">
                        <label>Название </label>
                        <input class="form-control" v-model="watch.brand">
                    </div>
                    <button class="btn btn-xs btn-primary" @click="update(watch.id, watch.brand)">сохранить</button>
                    <button class="btn btn-xs btn-link" @click="cancelEdit(watch.id)">отмена</button>
                    <!--<button class="btn btn-xs btn-link" @click="status.editing = false">отмена</button>-->
                </div>

                <div v-else v-text="watch.brand"></div>
            </td>
            <td>
                <a  @click="watch.editing = true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            </td>
            <td>
                <a href=""  class="delete"  @click="destroy(watch.id)">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </a>
            </td>

        </tr>
        </tbody>
    </table>
</template>
<script>
    export default {
        props: ['attributes'],

        data(){
            return {
                editing: false,
                watches: _.map(this.attributes, function(item) { return _.merge(item, {
                    editing: false,
                    old_brand: item.brand
                }); }),
            };
        },
        mounted() {
            // axios.get('/admin/calculator/get-statuses')
            //     .then((response) => {
            //         this.statuses = response.data
            //     });
        },

        methods: {
            destroy(id){

                axios.delete('/admin/calculator/watches/' + id);
                $('#' + id).fadeOut(600, ()=>{

                    window.flash('Бренд удален', 'success');
                });
            },

            update(id, brand){
                axios.patch('/admin/calculator/watches/' + id, {
                    brand: brand
                }).then(function(response){

                    if (response.data.class == 'success'){
                        window.flash(response.data.message, response.data.class);
                    }
                });

                // _.every(this.statuses, { 'editing': false });
                let watch = _.find(this.watches,  { 'id': id });
                watch.old_brand = watch.brand;
                watch.editing = false;
            },
            cancelEdit(id){
                let watch = _.find(this.watches,  { 'id': id });
                watch.brand = watch.old_brand;
                watch.editing = false;
                console.log(this.watches);
            }
        }
    }
</script>