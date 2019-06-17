<template>
    <el-row>
       <el-col :span="12">
            <charts-plugin :chartData="charData[0]"></charts-plugin>
        </el-col>
        <el-col :span="12">
            <charts-plugin :chartData="charData[1]"></charts-plugin>
        </el-col>
    </el-row>
</template>

<script>
import chartsPlugin from '@/components/chartsPlugin'

export default {
    // 统计
    name: "census",
    components: {
        chartsPlugin,
    },
    data() {
        return {
            charData: {
                0: {
                    id: 'chartData0',
                    style: 'width: 500px;height:350px',
                    option: {
                        legend: {},
                        tooltip: {
                            trigger: 'axis',
                            showContent: false
                        },
                        dataset: {
                            source: [
                                ['product', '2012', '2013', '2014', '2015', '2016', '2017'],
                                ['Matcha Latte', 41.1, 30.4, 65.1, 53.3, 83.8, 98.7],
                                ['Milk Tea', 86.5, 92.1, 85.7, 83.1, 73.4, 55.1],
                                ['Cheese Cocoa', 24.1, 67.2, 79.5, 86.4, 65.2, 82.5],
                                ['Walnut Brownie', 55.2, 67.1, 69.2, 72.4, 53.9, 39.1]
                            ]
                        },
                        xAxis: {type: 'category'},
                        yAxis: {gridIndex: 0},
                        grid: {top: '55%'},
                        series: [
                            {type: 'line', smooth: true, seriesLayoutBy: 'row'},
                            {type: 'line', smooth: true, seriesLayoutBy: 'row'},
                            {type: 'line', smooth: true, seriesLayoutBy: 'row'},
                            {type: 'line', smooth: true, seriesLayoutBy: 'row'},
                            {
                                type: 'pie',
                                id: 'pie',
                                radius: '30%',
                                center: ['50%', '25%'],
                                label: {
                                    formatter: '{b}: {@2012} ({d}%)'
                                },
                                encode: {
                                    itemName: 'product',
                                    value: '2012',
                                    tooltip: '2012'
                                }
                            }
                        ]
                    }
                },
                1: {
                    id: 'chartData1',
                    style: 'width: 500px;height:350px',
                    option: {
                        angleAxis: {
                        },
                        radiusAxis: {
                            type: 'category',
                            data: ['周一', '周二', '周三', '周四'],
                            z: 10
                        },
                        polar: {
                        },
                        series: [{
                            type: 'bar',
                            data: [1, 2, 3, 4],
                            coordinateSystem: 'polar',
                            name: 'A',
                            stack: 'a'
                        }, {
                            type: 'bar',
                            data: [2, 4, 6, 8],
                            coordinateSystem: 'polar',
                            name: 'B',
                            stack: 'a'
                        }, {
                            type: 'bar',
                            data: [1, 2, 3, 4],
                            coordinateSystem: 'polar',
                            name: 'C',
                            stack: 'a'
                        }],
                        legend: {
                            show: true,
                            data: ['A', 'B', 'C']
                        }
                    }
                },
            },
        }
    },
    methods: {
    }
};
</script>

<style>
    
</style>