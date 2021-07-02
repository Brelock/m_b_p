<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Заголовок</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        </thead>

        <tbody>
        <tr v-for="status in statuses" :id="status.id">
            <td>
                <div v-if="status.editing">
                    <div class="form-group">
                        <label>Название <img src="/img/ru.svg" alt="" style="width: 1.5em;"> </label>
                        <input class="form-control" v-model="status.title_ru">
                    </div>
                    <div class="form-group">
                        <label>Название <img src="/img/ua.svg" alt="" style="width: 1.5em;"> </label>
                        <input class="form-control" v-model="status.title_uk">
                    </div>
                    <div class="form-group">
                        <label>Процент</label>
                        <input name="percent" type="number" min="0" max="100" v-model="status.percent" class="form-control">
                    </div>
                    <button class="btn btn-xs btn-primary" @click="update(status.id, status.title_ru, status.title_uk,status.percent)">сохранить</button>
                    <button class="btn btn-xs btn-link" @click="cancelEdit(status.id)">отмена</button>
                    <!--<button class="btn btn-xs btn-link" @click="status.editing = false">отмена</button>-->
                </div>

                <div v-else v-text="status.title_ru"></div>
            </td>
            <td>
                <a  @click="status.editing = true"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            </td>
            <td>
                <a href=""  class="delete"  @click="destroy(status.id)">
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
                statuses: _.map(this.attributes, function(item) { return _.merge(item, {
                    editing: false,
                    old_title_ru: item.title_ru,
                    old_title_uk: item.title_uk,
                    old_percent: item.percent
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

                axios.delete('/admin/calculator/statuses/' + id);
                $('#' + id).fadeOut(600, ()=>{

                    window.flash('Статус удален', 'success');
                });
            },

            update(id, title_ru, title_uk, percent){
                axios.patch('/admin/calculator/statuses/' + id, {
                    title_ru: title_ru,
                    title_uk: title_uk,
                    percent: percent
                }).then(function(response){

                    if (response.data.class == 'success'){
                        window.flash(response.data.message, response.data.class);
                    }
                });

                // _.every(this.statuses, { 'editing': false });
                let status = _.find(this.statuses,  { 'id': id });
                status.old_title_ru = status.title_ru;
                status.old_title_uk = status.title_uk;
                status.old_percent = status.percent;
                status.editing = false;
            },
            cancelEdit(id){
                let status = _.find(this.statuses,  { 'id': id });
                status.title_ru = status.old_title_ru;
                status.title_uk = status.old_title_uk;
                status.percent = status.old_percent;
                status.editing = false;
                console.log(this.statuses);
            }
        }
    }
</script>