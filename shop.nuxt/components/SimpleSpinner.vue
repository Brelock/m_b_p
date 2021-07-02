<template functional>
	<div :class="['spinner', noBg]" v-show="props.active">
		<div class="lds-dual-ring" :class="[{'small':props.small}, {'big':props.big}]"></div>
	</div>
</template>

<script>
export default {
	functional: true,
	props: {
		active: Boolean,
		small: Boolean,
		big: Boolean,
		noBg: Boolean
	}
};
</script>
