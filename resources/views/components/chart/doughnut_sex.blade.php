<canvas id="review_chart_sex_{{$data['id']}}"></canvas>
<script>
  const data_{{$data['id']}} = {
    labels: [
      '男',
      '女',
      'その他'
    ],
    datasets: [
      {
        label: 'データ',
        data: [{{$data['man']}}, {{$data['woman']}}, {{$data['other']}}],
        fill: true,
        backgroundColor: [
          'rgb(54, 162, 235)',
          'rgb(255, 99, 132)',
          'rgb(255, 205, 86)'
        ],
      },
    ]
  };
  const config_{{$data['id']}} = {
    type: 'doughnut',
    data: data_{{$data['id']}},
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: '性別'
        }
      }
    },
  };
  const review_chart_sex_{{$data['id']}} = new Chart(
    document.getElementById('review_chart_sex_{{$data['id']}}'),
    config_{{$data['id']}}
  );
</script>