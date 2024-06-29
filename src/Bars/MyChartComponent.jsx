import React, { useRef, useEffect } from "react";
import { Chart } from "chart.js/auto";

const MyChartComponent = ({ periods, data }) => {
  const chartRef = useRef(null);

  useEffect(() => {
    const ctx = chartRef.current.getContext("2d");

    new Chart(ctx, {
      type: "line",
      data: {
        labels: periods,
        datasets: [
          {
            label: "Days",
            data: data,
            borderWidth: 3,
            fill: false,
            borderColor: "#15AD07",
            tension: 0.5,
          },
        ],
      },
      options: {
        plugins: {
          legend: {
            display: false,
          },
        },
        scales: {
          y: {
            min: 0,
            // max: 2000,
          },
        },
        responsive: true,
        maintainAspectRatio: true,
      },
    });

    // Cleanup function to destroy chart on component unmount
    return () => {
      if (chartRef.current) {
        const chartInstance = Chart.getChart(chartRef.current);
        if (chartInstance) {
          chartInstance.destroy();
        }
      }
    };
  }, []);

  return <canvas id="myChart3" ref={chartRef}></canvas>;
};

export default MyChartComponent;
