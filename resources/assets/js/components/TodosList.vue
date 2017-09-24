<template>
    <ul class="list-group">
        <todos-list-item v-bind:key="index"
                         v-for="(todo, index) in todos"
                         v-bind:todo="todo">
        </todos-list-item>
    </ul>
</template>
<script>

    import TodosListItem from './TodosListItem.vue';

    export default {
        components: {
            TodosListItem
        },
        computed: {
            todos() {
                return this.$store.getters.getTodos
            }
        }
    }
</script>
<style scoped>

</style>