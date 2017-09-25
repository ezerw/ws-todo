<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <div v-show="chartData" class="chart" ref="chart"></div>
        </div>
    </div>
</template>
<script>

    import Highcharts from 'highcharts';

    export default {
        data() {
            return {
                chart: {}
            }
        },
        computed: {
            chartData () {
                return this.$store.getters.getChartData;
            }
        },
        watch: {
            chartData () {
                this.renderChart()
            }
        },
        methods: {
            renderChart () {
                this.chart = Highcharts.chart(this.$refs.chart, {
                    chart: { type: 'line' },
                    title: {
                        text: 'Non completed at each minute in the last hour'
                    },
                    xAxis: {
                        categories: this.chartData.labels
                    },
                    yAxis: {
                        title: {
                            text: 'Todos'
                        }
                    },
                    series: [{
                        name: 'Non Completed',
                        data: this.chartData.totals
                    }]
                });
            }
        },
        mounted() {
            this.$store.dispatch("fetchChartData")

            setInterval( () => {
                this.$store.dispatch("fetchChartData")
                console.info('Fresh data loaded')
            }, 60 * 1000)
        }
    }
</script>
<style scoped>
    .chart{
        width: 100%;
        height: 300px;
        background: #f9f9f9;
    }
</style>