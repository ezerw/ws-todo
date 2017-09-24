import moment from 'moment'

/**
 * Get Errors for name field
 *
 * @param state
 * @returns {*}
 */
export const getNameErrors = state => {
    return _.get(_.head(state.errors), 'name', '');
};

/**
 * Get all todos
 *
 * @param state
 */
export const getTodos = state => state.todos

/**
 * Get non completed todos
 *
 * @param state
 * @returns {Object}
 */
export const getNonCompletedTodos = state => {
    return state.todos.filter(todo => {
        return todo.completed === false;
    })
}

export const getSeries = (state, getters) => {
    return hourMinutes => hourMinutes.map(hourMinute => {
        return getters.getNonCompletedTodos.reduce( (sum, todo) => {
            let hour = parseInt(hourMinute.split(':')[0]);
            let minute = parseInt(hourMinute.split(':')[1]);

            let todoHour = parseInt(moment(todo.update).format('HH'));
            let todoMinute = parseInt(moment(todo.update).format('mm'));

            return (hour == todoHour && minute == todoMinute) ? sum += 1 : sum;
        }, 0)
    })
}