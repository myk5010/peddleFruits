<template>
  <div class="charts">
    <div :id="chartDataInfo.id" :style="chartDataInfo.style"></div>
  </div>
</template>

<script>

export default {
  name: 'chartsPlugin',
  props: [ 'chartData' ],
  data () {
    return {
      chartDataInfo: this.chartData
    }
  },
  mounted () {
    this.drawLine()
  },
  watch: {
    chartDataInfo: {
      handler (newValue, oldValue) {
        this.chartDataInfo = newValue
        this.drawLine()
      },
      deep: true
    }
  },
  methods: {
    drawLine () {
      // 基于准备好的dom，初始化echarts实例
      let myChart = this.$echarts.init(document.getElementById(this.chartDataInfo.id))
      // 绘制图表
      myChart.setOption(this.chartDataInfo.option)
    }
  }
}
</script>

<style>

</style>
