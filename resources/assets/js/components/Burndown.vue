<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="chart" ref="chart"></div>
        </div>
    </div>
</template>
<script>

    import moment from 'moment';
    import Highcharts from 'highcharts';

    export default {
        data() {
            return {
                chart: {},
                chartStart: moment().subtract(1, 'h'), //An Hour ago
                chartEnd: moment(),
                labels: [],
                series: [11,10,9,8,7,6,5,4,3,2,1,0]
            }
        },
        watch: {
            'labels': 'createChart'
        },
        computed: {

            /*series(){
                return this.$store.getters.getSeries(this.labels)
            }*/
        },
        methods: {
            buildLabels() {
                while(this.chartStart.isBefore(this.chartEnd, 'm')){
                    this.labels.push(this.chartStart.format('HH:mm'))
                    this.chartStart.add(1, "m")
                }
            },
            createChart() {
                this.chart = Highcharts.chart(this.$refs.chart, {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Non completed at each minute in the last hour'
                    },
                    xAxis: {
                        categories: this.labels //Every minute from one hour ago
                    },
                    yAxis: {
                        title: {
                            text: 'Todos'
                        }
                    },
                    series: [{
                        name: 'Non Completed',
                        data: this.series //Todo Totals
                    }]
                });
            }
        },
        mounted() {
            this.buildLabels();
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