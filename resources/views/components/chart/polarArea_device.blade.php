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
        backgroundColor: 'rgba(101, 247, 120, 0.2)',
        borderColor: 'rgba(101, 247, 120, 1)',
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