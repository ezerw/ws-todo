import Vue from 'vue'
import Vuex from 'vuex'

import * as types from './mutation-types'

import * as actions from './actions'
import * as getters from './getters'

Vue.use(Vuex)

export default new Vuex.Store({
    strict: true,
    state: {
        todos: [],
        chartData: [],
        errors: []
    },
    getters,
    actions,
    mutations: {
        [types.FETCH_TODOS](state, todos) {
            state.todos = todos;
        },
        [types.CHART_DATA](state, chartData) {
            state.chartData = chartData;
        },
        [types.ADD_TODO](state, todo) {
            state.todos.push(todo);
        },
        [types.TOGGLE_TODO_STATUS](state, todoId) {
            const todo = state.todos.find(todo => todo.id == todoId);
            todo.completed = !todo.completed;
        },
        [types.DELETE_TODO](state, todos) {
            state.todos = todos;
        },
        [types.HANDLE_ERROR](state, errors) {
            state.errors.push(errors);
        },
        [types.CLEAN_ERRORS](state) {
            state.errors = [];
        }
    }

})