<template>
    <li class="list-group-item">
        <div class="todo">
            <div class="row">
                <div class="col-md-9">
                    <p v-bind:class="{'completed': todo.completed == true}">
                        <a href="#" v-on:click.stop.prevent="$store.dispatch('toggleTodoStatus', todo)">{{ todo.name }}</a>
                    </p>
                </div>
                <div class="col-md-3">
                    <button v-on:click.stop.prevent="$store.dispatch('deleteTodo', todo)"
                            class="btn btn-danger pull-right">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                    </button>
                </div>
            </div>

        </div>
    </li>
</template>
<script>
    export default {
        props: {
            todo: {
                type: Object,
                default: () => {}
            }
        }
    }
</script>
<style lang="scss" scoped>
    .todo{
        font-size: 1.5em;
        p{
            margin-bottom: 0;
            &.completed{
                text-decoration: line-through;
            }
             a{
                 display: block;
                 color: inherit;
                 text-decoration: none;
             }
        }
    }
</style>