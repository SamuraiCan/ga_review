@extends('layouts/layout')

@section('content')

  <x-heading.h1
    title="退会ページ"
    subTitle="Withdrawal Page"
  />

	<div class="container">
		<div class="card">
			<div class="card-header">
				退会する際の注意事項
			</div>
			<div class="card-body">
				<div class="alert alert-danger">
					元には戻せません！
				</div>
				<div>
					今までの口コミは残ります！
				</div>
			</div>
			<div class="card-footer text-center">
				<form method="post" action="{{ route('user.destroy', $user->id) }}">
					@csrf
					@method('DELETE')
					<button
						type="submit"
						class="btn btn-danger"
						onclick="return confirmWithdrawal()"
					>
						削除
					</button>
				 </form>
				 <script>
					 function confirmWithdrawal() {
						return confirm("本当に退会してもよいですか？");
					 }
				 </script>
			</div>
		</div>
	</div>

@endsection