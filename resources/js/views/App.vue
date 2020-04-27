<template>
    <div class="container">
        <div class="row">            
            <div class="col-md-2"><h3>Мои задачи</h3></div>
            <div class="col-md-4">                
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
                    Фильтр
                </button>
                <!-- Modal -->
                <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">                        
                            <div class="modal-body">                                
                                <form>
                                    <div class="form-group">
                                        <label for="form_role" class="col-form-label">Роль:</label>
                                        <select v-model="filter.role" id="form_role" class="form-control">
                                            <option value="">Выберите один из вариантов</option>
                                            <option v-for="role in roles" v-bind:value="role.value">
                                                {{ role.text }}
                                            </option>                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="form_resposible" class="col-form-label">Ответственный:</label>
                                        <select v-model="filter.responsible" id="form_resposible" class="form-control">
                                            <option value="">Выберите один из вариантов</option>
                                            <option v-for="user in users" v-bind:value="user.value">
                                                {{ user.text }}
                                            </option>                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="form_author" class="col-form-label">Постановщик:</label>
                                        <select v-model="filter.author" id="form_author" class="form-control">
                                            <option value="">Выберите один из вариантов</option>
                                            <option v-for="user in users" v-bind:value="user.value">
                                                {{ user.text }}
                                            </option>                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="form_title" class="col-form-label">Наименование:</label>
                                        <input v-model="filter.title" type="text" class="form-control" id="form_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="form_status" class="col-form-label">Статус:</label>
                                        <select v-model="filter.status" id="form_status" class="form-control">
                                            <option value="">Выберите один из вариантов</option>
                                            <option v-for="status in statuses" v-bind:value="status.value">
                                                {{ status.text }}
                                            </option>                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="form_finish_time" class="col-form-label">Крайний срок:</label>
                                        <input v-model="filter.finish_time" class="form-control" type="date" value="null" id="form_finish_time">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">                                
                                <button type="button" class="btn btn-primary" v-on:click="sendFilter()">Найти</button>
                                <button type="button" class="btn btn-secondary" v-on:click="filter = {}">Сбросить</button>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>                        
        </div>
        <table class="table">
                    <thead>
                        <tr>                        
                        <th scope="col">Название</th>
                        <th scope="col">Роль</th>                        
                        <th scope="col">Ответственный</th>                        
                        <th scope="col">Постановщик</th>                        
                        <th scope="col">Статус</th>                        
                        <th scope="col">Крайний срок</th>                        
                        </tr>
                    </thead>
                    <tbody>                        
                        <tr v-for="task in tasks" :key="task.id">                                                    
                            <td>{{task.title}}</td>
                            <td>{{roles.find(x => x.value === task.role_id).text}}</td>
                            <td>{{users.find(x => x.value === task.responsible_id).text}}</td>
                            <td>{{users.find(x => x.value === task.author_id).text}}</td>
                            <td>{{statuses.find(x => x.value === task.status_id).text}}</td>
                            <td>{{task.finish_time}}</td>                            
                        </tr>
                    </tbody>
                </table>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                roles: [
                    { text: 'Роль 1', value: 1 },
                    { text: 'Роль 2', value: 2 },
                    { text: 'Роль 3', value: 3 },
                    { text: 'Роль 4', value: 4 },
                    { text: 'Роль 5', value: 5 },
                    { text: 'Роль 6', value: 6 },
                    { text: 'Роль 7', value: 7 },
                    { text: 'Роль 8', value: 8 },
                    { text: 'Роль 9', value: 9 },
                    { text: 'Роль 10', value: 10 },

                ],
                users: [
                    { text: 'Пользователь 1', value: 1 },
                    { text: 'Пользователь 2', value: 2 },
                    { text: 'Пользователь 3', value: 3 },
                    { text: 'Пользователь 4', value: 4 },
                    { text: 'Пользователь 5', value: 5 },
                    { text: 'Пользователь 6', value: 6 },
                    { text: 'Пользователь 7', value: 7 },
                    { text: 'Пользователь 8', value: 8 },
                    { text: 'Пользователь 9', value: 9 },
                    { text: 'Пользователь 10', value: 10 },

                ],
                statuses: [
                    { text: 'Статус 1', value: 1 },
                    { text: 'Статус 2', value: 2 },
                    { text: 'Статус 3', value: 3 },
                    { text: 'Статус 4', value: 4 },
                    { text: 'Статус 5', value: 5 },
                    { text: 'Статус 6', value: 6 },
                    { text: 'Статус 7', value: 7 },
                    { text: 'Статус 8', value: 8 },
                    { text: 'Статус 9', value: 9 },
                    { text: 'Статус 10', value: 10 },

                ],
                tasks: [],
                filter:{}
            }
        },
        mounted() {            
            var app = this;
            axios.get('/api/v1/tasks')
                .then(function (resp) {
                    app.tasks = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load tasks");
                });
        },
        methods: {
            sendFilter(){
                var app = this;                
                axios.get('/api/v1/tasks', { params: app.filter } )
                    .then(function (resp) {
                        app.tasks = resp.data;
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not load tasks");
                    });
            }
        }
    }
</script>