<template>
	<nav
		aria-label="breadcrumb"
		class="breadcrumb-nav"
	>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<nuxt-link to="/">
					Home
				</nuxt-link>
			</li>
			<li class="breadcrumb-item">
				<a href="javascript:;">Products</a>
			</li>
		</ol>
	</nav>
</template>

<script>
export default {
	props: {
		parents: Array,
		current: String
	}
};
</script>