<template>
	<div class="not-found-page" v-if="error.statusCode === 404">
		<div class="wrapper wrapper-full-page flex align-center justify-center">
			<div class="full-page">
				<div class="page-content">
					<h2 class="title page-title">УПС!</h2>

					<div class="description">
						Похоже, мы не можем найти нужную вам страницу
					</div>

					<div class="section-image">
						<img src="@/assets/img/404-page.png" alt="404" />
					</div>

					<NuxtLink class="el-button standardButton primary" to="/">на главную</NuxtLink>
				</div>
			</div>
		</div>
	</div>

</template>

<script>

	export default {
		props: ['error'],
		// layout: 'error' // you can set a custom layout for the error page
	}
</script>