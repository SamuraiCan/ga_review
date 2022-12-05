<canvas id="review_chart_{{$data['id']}}"></canvas>
<script>
  const data_{{$data['id']}} = {
    labels: [
      'グラフィック',
      'ボリューム',
      'サウンド',
      'ストーリー',
      'コンフォート'
    ],
    datasets: [
      {
        label: 'データ',
        data: [{{$data['graphic']}}, {{$data['volume']}}, {{$data['sound']}}, {{$data['story']}}, {{$data['comfort']}}],
        fill: true,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgb(255, 99, 132)',
        pointBackgroundColor: 'rgb(255, 99, 132)',
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: 'rgb(255, 99, 132)'
      },
    ]
  };
  const config_{{$data['id']}} = {
    type: 'radar',
    data: data_{{$data['id']}},
    options: {
      elements: {
        line: {
          borderWidth: 3
        }
      },
      scales: {
        r: {
          min: 0,
          max: 10,
          stepSize: 1,
          fontSize: 10,
          fontColor: "purple",
          ticks: {
            stepSize: 1
          }
        },
      }
    }
  };
  const review_chart_{{$data['id']}} = new Chart(
    document.getElementById('review_chart_{{$data['id']}}'),
    config_{{$data['id']}}
  );
</script>