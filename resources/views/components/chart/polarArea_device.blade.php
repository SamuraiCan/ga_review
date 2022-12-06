<canvas id="review_chart_device_{{$data['id']}}"></canvas>
<script>
  const data_{{$data['id']}} = {
    labels: [
      @foreach ($data['values'] as $k => $v)
        '{{ $k }}',
      @endforeach
    ],
    datasets: [
      {
        label: 'デバイス',
        data: [
          @foreach ($data['values'] as $v)
            {{ $v }},
          @endforeach
        ],
        fill: true,
        backgroundColor: [
          '#f44336',
          '#9c27b0',
          '#673ab7',
          '#3f51b5',
          '#2196f3',
          '#00bcd4',
          '#4caf50',
          '#cddc39',
          '#ffc107',
          '#ff9800',
        ],
        borderColor: 'rgba(255, 255, 255, 0.5)',
        pointBackgroundColor: 'rgb(255, 99, 132)',
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: 'rgb(255, 99, 132)'
      },
    ]
  };
  const config_{{$data['id']}} = {
    type: 'polarArea',
    data: data_{{$data['id']}},
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'デバイス'
        }
      }
    },
  };
  const review_chart_device_{{$data['id']}} = new Chart(
    document.getElementById('review_chart_device_{{$data['id']}}'),
    config_{{$data['id']}}
  );
</script>