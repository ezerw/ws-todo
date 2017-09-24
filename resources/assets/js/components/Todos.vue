<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">User Todos</h3>
        </div>
        <div class="panel-body">
            <div class="todos">

                <!-- Validation Error -->
                <div class="alert alert-danger" role="alert" v-if="nameErrors.length > 0">
                    <strong>Oh snap!</strong>
                    <ul>
                        <li v-for="error in nameErrors">{{ error }}</li>
                    </ul>
                </div>

                <!-- List of Todos -->
                <todos-list></todos-list>

                <hr>

                <!-- Add todo Form -->
                <form v-on:submit.prevent.stop="addTodo">
                    <input type="text" v-model="todo.name" class="form-control">
                    <button type="submit" v-bind:disabled="hasNotName" class="btn btn-default">
                        <span class="glyphicon glyphicon-plus"></span> Add Todo
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>

    import TodosList from './TodosList.vue';

    export default {
        components: {
            TodosList
        },
        data() {
            return {
                todo: {
                    name: '',
                    completed: false
                }
            }
        },
        computed: {
            hasNotName() {
                return _.isEmpty(this.todo.name);
            },
            nameErrors() {
                return this.$store.getters.getNameErrors;
            }
        },
        methods: {
            addTodo() {
                this.$store.dispatch("cleanErrors");
                this.$store.dispatch("addTodo", this.todo);
                this.todo = { name: '', completed: false };
            }
        },
        mounted() {
            this.$store.dispatch("fetchTodos");
        }
    }
</script>
<style lang="scss" scoped>
    .todos{
        margin: 10px;
        form{
            display: flex;
            button{
                margin-left: 5px;
            }
        }
        .alert ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
    }
</style>