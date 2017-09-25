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
 * Get todos by status
 *
 * @param state
 * @returns {(p1:*)=>Array.<*>}
 */
export const getTodosWithCompletedAs = state => {
    return status => state.todos.filter(todo => {
        return todo.completed === status;
    })
}

/**
 * Returns the ChartData
 *
 * @param state
 */
export const getChartData = (state) => {

    let labels = Object.keys(state.chartData);
    let totals = labels.map(function (k) {
        return state.chartData[k];
    });

    return {
        labels: labels,
        totals: totals
    }
}