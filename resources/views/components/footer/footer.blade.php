<footer class="mt-5 bg-warning fw-bold py-5">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <div>{{ config('app.name') }}</div>
        <div>
          <div>{{ config('app.zip') }}</div>
          <div>{{ config('app.address1') }}</div>
          <div>{{ config('app.address2') }}</div>
        </div>
      </div>
      <div class="col-12 col-md-6 text-end">
        <ul class="mb-5 list-inline">
          <li class="list-inline-item">TOP</li>
          <li class="list-inline-item">MY PAGE</li>
          <li class="list-inline-item">CONTACT</li>
          <li class="list-inline-item">利用規約</li>
          <li class="list-inline-item">プライバシーポリシー</li>
          <li class="list-inline-item">運営会社</li>
        </ul>
        <ul class="mb-2 list-inline">
          <li class="list-inline-item">Twitter</li>
          <li class="list-inline-item">Facebook</li>
          <li class="list-inline-item">note</li>
        </ul>
        &copy; {{ config("app.copyright") }}
      </div>
    </div>
  </div>
</footer>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@livewireScripts

</body>
</html>