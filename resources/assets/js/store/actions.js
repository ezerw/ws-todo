import * as types from './mutation-types'

/**
 * Fetch all User Todos
 *
 * @param commit
 */
export const fetchTodos = ({ commit }) => {
    axios
        .get('api/todos')
        .then(response => {
            commit(types.FETCH_TODOS, response.data.data);
        })
        .catch(errors => {})
};

/**
 * Fetch Chart Data
 *
 * @param commit
 */
export const fetchChartData = ({ commit }) => {
    axios
        .get('api/chart-data')
        .then(response => {
            commit(types.CHART_DATA, response.data.data);
        })
        .catch(errors => {})
};

/**
 * Store new Todo
 *
 * @param commit
 * @param todo
 */
export const addTodo = ({commit}, todo) => {
    axios
        .post('api/todos', todo)
        .then(response => {
            commit(types.ADD_TODO, response.data.data);
        })
        .catch(errors => {
            commit(types.HANDLE_ERROR, errors.response.data.errors);
        })
}

/**
 * Toggle todo status
 *
 * @param commit
 * @param todo
 */
export const toggleTodoStatus = ({ commit }, todo) => {

    axios
        .patch('api/todos/' + todo.id, todo)
        .then(response => {
            commit(types.TOGGLE_TODO_STATUS, todo.id);
        })
        .catch(errors => {})

};

/**
 * Delete Todo
 *
 * @param commit
 * @param todo
 */
export const deleteTodo = ({ commit }, todo) => {

    axios
        .delete('api/todos/' + todo.id)
        .then(response => {
            commit(types.DELETE_TODO, response.data.data);
        })
        .catch(errors => {})

};

/**
 * Clean validation Errors
 *
 * @param commit
 */
export const cleanErrors = ({commit}) => {
    commit(types.CLEAN_ERRORS);
}
