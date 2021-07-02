<template functional>
	<li>
			<!-- path: `/c_${props.item.alias}`, -->
		<nuxt-link :to="listeners.localePath({
			name:'catalog',
			params: { 'catalog': `c_${props.item.alias}`, alias: props.item.alias } 
		})" v-text="props.item[`title_${props.i18n.locale}`]"></nuxt-link>

		<!-- <nuxt-link :to="{	
			name:'catalog',
			params: { 'catalog': `c_${props.item.alias}`, alias: props.item.alias } 
		}" v-text="props.item[`title_${props.i18n.locale}`]"></nuxt-link> -->

		<!-- <div>{{props.i18n}}</div> -->

		<template v-if="props.item.children.length">
			<i class="icomoon icon-arrow2 subMenuButton"
			@click="listeners.toggleSubMenu"></i>

			<div class="submenuWrapper hiddenContent right">
				<ul class="submenu">
					<NavMenuItem v-for="subCategory in props.item.children"
						@toggleSubMenu="listeners.toggleSubMenu"
						:name="`prod_subcat-${subCategory.id}_nav-${props.item.id}`"
						:key="`prod_subcat-${subCategory.id}_nav-${props.item.id}`"
						:item="subCategory"
						:i18n="props.i18n"
						@localePath="listeners.localePath"
					/>
				</ul>
			</div>
		</template>
	</li>	
</template>

<script>
  import NavMenuItem from './NavMenuItem.vue'
	import { toggleSubMenu } from '@/helpers/domHelpers';

	export default {
		functional: true,
		name: 'NavMenuItem',
		components: { NavMenuItem },
		props: {
			item: {
				type: Object,
			},
			i18n: {
				type: Object,
				default:() => {}
			},
		}
	};
</script>
