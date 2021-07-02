<template>
	<header id="mainHeader" class="mainHeader">
		<CoverOverlay
			:active="overlay.show"
			:z="overlay.zIndex"
			@onClick="()=>toggleAuthModal()"
		/>

		<div class="top-section">
			<div class="mcontainer">
				<div class="content-wrapper flex center">
					<div class="headerSectionBlock firstPartBlock flex center">
						<div class="buttonWrapper section-element mcol-md-hide">
							<button
								type="button"
								class="burgerButton mobileMenuButton"
								@click="openMobileMenu"
							>
								<div class=""><i class="icomoon icon-menu-burger"></i></div>
							</button>
						</div>

						<div class="logoBlock section-element mcol-md-auto">
							<div class="logo-wrapper">
								<nuxt-link :to="localePath('/')">
									<div class="imgWrapper">
										<mainLogo/>
										<!-- <img :src="mainLogo" alt="logo"> -->
									</div>
									<!-- <div class="logo-type">name <span>logotype</span></div> -->
								</nuxt-link>
							</div>
						</div>
					</div>

					<div class="headerSectionBlock flex center secondPartBlock">
						<div class="section-element searchBlock">
							<SearchBar
								@submit="(data) => setProductsFilters(data, { search: true })"
								:options="searchbarOptions"
								:query="products_filters.q"
								:clearable="true"
							/>
						</div>

						<div class="section-element langBlock menu mcol-xs-hide mcol-md-show">
							<div class="menu-button lang-buttons" @click="toggleMenu">
								<i class="icomoon gradientIcon icon-lang"></i>
								<span
									class="link uppercase"
									:class="{ active: locale.code == $i18n.locale }"
									v-for="locale in $i18n.locales"
									:key="locale.code"
									@click="$i18n.setLocale(locale.code)"
									>{{ locale.code }}</span
								>
							</div>
							<div class="sub-menu mobile">
								<div class="sub-menu-container">
									<ul class="items-list">
										<li>
											<span
												class="link uppercase"
												:class="{ active: locale.code == $i18n.locale }"
												@click="$i18n.setLocale(locale.code)"
												v-for="locale in $i18n.locales"
												:key="locale.code"
												>{{ locale.code }}</span
											>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- <div class="section-element same-width likesBlock menu"
							:class="{'active': favoritedProducts.length}">
							<a href="#" class="menu-button">
								<i class="icomoon gradientIcon icon-like1 relative">
									<span class="quantity" v-if="favoritedProducts.length">
										<span>{{favoritedProducts.length}}</span>
									</span>
								</i>
								<span class="text">Избранное</span>
							</a>

							<div class="sub-menu">
								<div class="menu-header flex spaceBetween center title">
									<div class="page-title medium">Избранное</div>
								</div>

								<ProductsSubmenuList v-if="favoritedProducts.length"
									@event="handleEvent"
									:isFavorites="true"
									:products="favoritedProducts"
								/>
								<div v-else class="section-title">Список пуст</div>

								<div class="menu-footer">
									<a href="#" class="standardButton primary-inverted uppercase">перейти в каталог товаров</a>
								</div>
							</div>
						</div> -->

						<div class="section-element accountBlock menu same-width">
							<!-- <nuxt-link :to="localePath(`${authUser?'/profile':'/login'}`)" class="menu-button">
								<i class="icomoon gradientIcon icon-login"></i>
								<span>{{ $t('menu.profile') }}</span>
							</nuxt-link> -->

							<div class="menu-button" @click="()=>toggleAuthModal()">
								<i class="icomoon gradientIcon icon-login"></i>
								<span>{{ $t("menu.profile") }}</span>
							</div>

							<ProfileSubmenu :authUser="authUser" />
						</div>

						<div
							class="section-element same-width cartBlock menu"
							:class="[{ active: cartLenght }]"
						>
							<nuxt-link
								class="menu-button"
								:to="localePath('/cart')"
							>
								<i class="icomoon gradientIcon icon-basket relative">
									<span class="quantity" v-if="cartLenght">
										<span>{{ cartLenght }}</span>
									</span>
								</i>
								<span v-if="cartLenght" class="text"
									>{{ $t("common.summ") }} <br />
									<b v-text="cartData.final_amount"></b>
								</span>
								<span v-else class="text capitalize-first"
									>{{ $t("common.cart_empty") }}
								</span>
							</nuxt-link>

							<div :class="['sub-menu', { js_hide: closeHoverMenues }]">
								<div class="menu-header flex spaceBetween center title">
									<div class="page-title medium capitalize-first">
										{{ $t("common.cart") }}
									</div>
								</div>

								<ProductsSubmenuList
									v-if="cartLenght"
									@event="handleEvent"
									:itemsLoading="cartLoading || cartSaving"
									:isCart="true"
									:cartList="cartData.orderProducts"
									:i18n="$i18n"
									@localePath="localePath"
								/>

								<div class="menu-footer flex spaceBetween" v-if="cartLenght">
									<div class="info-block">
										<div class="">{{ $t("common.summ") }}</div>
										<div class="total-price">
											<b v-text="`${cartData.final_amount} грн`"></b>
										</div>
									</div>

									<span @click="handleLinkClick">
										<nuxt-link
											:to="localePath('/cart')"
											class="standardButton primary uppercase"
											v-text="'перейти в корзину'"
										></nuxt-link>
									</span>
									<!-- <a href="/cart.html" class="standardButton primary uppercase">перейти в корзину</a> -->
								</div>

								<div v-else class="section-title">
									{{ $t("common.list_empty") }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bottom-section">
			<div class="menuMainWrapper">
				<div
					class="menuBlock relative 1secondPartBlock"
					:class="{ active: mobileMenuOpen }"
				>
					<nav
						id="navMenuWrapper"
						class="navMenuWrapper sectionBlock hiddenContent left"
						:class="{ js_showSlide: mobileMenuOpen }"
					>
						<div
							id="navMenuContainer"
							class="navMenuContainer mcontainer backgroundMock"
						>
							<div class="menuButtonsContainer flex spaceBetween mcol-md-hide">
								<button
									id="prevMenuButton"
									type="button"
									class="prevMenuButton"
									@click="stepBack"
								>
									<i class="icomoon icon-arrow2"></i>
								</button>
								<button
									type="button"
									class="closeMenuButton"
									@click="closeMobileMenu"
								>
									<i class="icomoon icon-cross1"></i>
								</button>
							</div>

							<ul id="navMenu" :class="['navMenu menu-section', { 'hide-sub-menues': !isMobile && closeHoverMenues }]">
								<li class="mobile-search wrapperBlock">
									<SearchBar
										@submit="
											(data) => setProductsFilters(data, { search: true })
										"
										:options="searchbarOptions"
										:query="products_filters.q"
										:clearable="true"
									/>
								</li>
								<li class="firstPartBlock descMenuButton">
									<i class="icomoon icon-menu-burger descBurgerIcon"></i>
									<!-- <a href="/productsList.html">Каталог товаров</a> -->
									<span class="cat-link">{{ $t("menu.catalog") }}</span>
									<i
										class="icomoon icon-arrow2 subMenuButton mcol-md-hide"
										@click="toggleSubMenu"
									></i>

									<div
										:class="[
											'submenuWrapper hiddenContent right',
											{ js_hide: isLoading },
										]"
										:style="{ height: submenuWrapperHeight }"
									>
										<ul class="submenu">
											<NavMenuItem
												v-for="category in catalogData"
												@toggleSubMenu="toggleSubMenu"
												:key="`prod_nav_cat-${category.id}`"
												:item="category"
												:i18n="$i18n"
												@localePath="localePath"
											/>
											<!-- @getPath="getPath" -->
										</ul>
									</div>
								</li>

								<!-- <li class="mcol-md-hide">
									<a href="/departments.html">Избранное</a>
									<span class="quantity">3</span>
								</li> -->
								<!-- <li class="mcol-md-hide">
									<a href="/departments.html">Вы смотрели</a>
									<span class="quantity">10</span>
								</li> -->

								<!-- ======================== -->
								<!-- <li class="@@countriesList"><a class="link" href="/departments.html">Акции</a></li> -->
								<!-- <li class="@@news"><a class="link" href="/news.html">Новости</a></li> -->
								<li class="link home-link mcol-xs-hide mcol-md-show">
									<nuxt-link :to="localePath('/')" class="link">
										<i class="icomoon icon-home"></i>
									</nuxt-link>
								</li>
								<li>
									<nuxt-link class="link" to="/new_products">{{
										$t("menu.new_items")
									}}</nuxt-link>
								</li>
								<li>
									<nuxt-link class="link" to="/about_us">{{
										$t("menu.about_us")
									}}</nuxt-link>
								</li>
								<li>
									<nuxt-link class="link" to="/delivery_payment">{{
										$t("menu.delivery_payment")
									}}</nuxt-link>
								</li>
								<!-- <li class="@@shops"><a class="link" href="/shops.html">Магазины</a></li> -->
								<li>
									<nuxt-link class="link" to="/contacts">{{
										$t("menu.contacts")
									}}</nuxt-link>
								</li>
								<li class="menu-group phoneBlock menu">
									<div
										class="link phones-menu-button mcol-xs-hide mcol-md-show-inline"
										data-target="phones-menu"
										@click="toggleDropdown"
									>
										<!-- <span class="button-text md">еще</span> -->
										<span class="button-text full">+38 (800) 700-43-43</span>
										<i class="icomoon icon-arrow2"></i>
									</div>
									<!-- <li><a href="tel:+38(800)7004343">+38 (800) 700-43-43</a></li> -->
									<div
										id="phones-menu"
										class="sub-menu phones-menu hiddenContent height"
									>
										<!-- v-show="phonesMenuOpen"> -->
										<!-- :class="{'active': phonesMenuOpen}"> -->
										<ul class="phones-list">
											<li>
												<div>
													<div class="phone-num">
														<i class="icomoon icon-phone-call"></i> +38 (800)
														700-43-43
													</div>
													<div class="info-block">с 8:00 до 21:00 (пн-вс)</div>
												</div>
											</li>
											<li>
												<div>
													<div class="phone-num">
														<i class="icomoon icon-phone-call"></i> +38 (800)
														700-43-42
													</div>
													<div class="info-block">
														{{ $t("menu.free_in_ukraine") }}
													</div>
												</div>
											</li>
										</ul>
									</div>
								</li>
								<li class="menu-group call-me-group menu">
									<div
										class="call-me-button menu-group_button standardButton secondary-inverted capitalize-first"
										data-target="call-me-menu"
										@click="toggleDropdown"
									>
										{{ $t("menu.callback_me") }}
									</div>

									<div
										id="call-me-menu"
										class="sub-menu call-me-menu hiddenContent height mcol-xs-hide mcol-md-show"
									>
										<CallMeBlock @submit="callMe" />
									</div>
								</li>
								<li class="menu-group langBlock mobile mcol-md-hide">
									<div class="">
										<i class="icomoon icon-lang"></i>
										<span
											class="link uppercase"
											:class="{ active: locale.code == $i18n.locale }"
											v-for="locale in $i18n.locales"
											:key="locale.code"
											@click="$i18n.setLocale(locale.code)"
											>{{ locale.code }}</span
										>
									</div>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>

		<!-- <div class="mobile-quick-menu mcol-md-hide">
			<div class="mcontainer">
				<ul class="menu-list">
					<li
						v-for="(category, idx) in catalogData"
						v-if="idx < 3"
						:key="`prod_quick_nav_cat-${category.id}`"
					>
						<nuxt-link
							:to="
								localePath({
									name: 'catalog',
									params: {
										catalog: `c_${category.alias}`,
										alias: category.alias,
									},
								})
							"
							v-text="category[`title_${$i18n.locale}`]"
						></nuxt-link>
					</li>
				</ul>
			</div>
		</div> -->

		<CustomModal
			:className="'auth-dialog'"
			v-if="isMobile"
			:active="authModalShow"
			:title="$t('menu.profile')"
			@onClose="()=>toggleAuthModal()"
		>
			<div class="popUpContainer">
				<ProfileSubmenu :authUser="authUser" />
			</div>
		</CustomModal>
	</header>
</template>

<script>
import { mapState, mapActions } from "vuex";

import SearchBar from "@/components/SearchBar";
import NavMenuItem from "./NavMenuItem.vue";
import CoverOverlay from "@/components/CoverOverlay";

import { eventHandler, itemsFetchSetMixin, cartLenght } from "@/mixins";
import { toggleSubMenu, stepBack, dropDown, scrollTo } from "@/helpers/domHelpers";
import { getParamsFromUrl } from '@/services/api_helpers';

// import { logoImg, mockImg } from '@/constants/global';
import mainLogo from '@/assets/svg/main-logo.svg';
import { Notification } from 'element-ui';

export default {
	mixins: [eventHandler, itemsFetchSetMixin, cartLenght],
	components: {
		SearchBar,
		NavMenuItem,
		CoverOverlay,
		mainLogo,
		// NavMenuItem: () => import('./NavMenuItem.vue'),
		ProfileSubmenu: () => import("./ProfileSubmenu.vue"),
		ProductsSubmenuList: () => import("./ProductsSubmenuList.vue"),
		CallMeBlock: () => import("@/components/CallMeBlock.vue"),
		CustomModal: () => import("@/components/CustomModal.vue"),
	},

	computed: {
		...mapState({
			catalogData: (state) => state.categories.catalogData,
			favoritedProducts: (state) => state.products.favoritedProducts,
			cartData: (state) => state.cart.itemData,
			authUser: (state) => state.auth.authUser,
			cookie_hash: (state) => state.auth.cookie_hash,
			categoriesLoading: (state) => state.categories.isLoading,
			productsLoading: (state) => state.products.isLoading,
			cartLoading: (state) => state.cart.isLoading,
			cartSaving: (state) => state.cart.isSaving,
			products_filters: (state) => state.products.filters,
			// overlay: state => state.global.overlay,
		}),

		// mainLogo: () => mainLogo,
		// mockImg: () => mockImg,
		searchbarOptions() {
			return {
				suffix: "icomoon icon-search gradientIcon",
				shadow: true,
			};
		},

		isLoading() {
			return this.categoriesLoading || this.productsLoading;
		},

		toggleSubMenu: () => toggleSubMenu,
		stepBack: () => stepBack,
		dropDown: () => dropDown,
	},

	data: () => ({
		authModalShow: false,
		isMobile: false,
		submenuWrapperHeight: "",
		closeHoverMenues: false,
		mobileMenuOpen: false,
		phonesMenuOpen: false,
		/*filters: {
				q: ''
			}*/
		overlay: {
			show: false,
			zIndex: 1700,
		},
	}),

	methods: {
		...mapActions({
			// fetch_catalog_items: 'categories/fetch_catalog_items',
			fetch_products: "products/fetch_products",
			fetch_favorited: "products/fetch_favorited",
			fetch_cart: "cart/fetch_cart",
			remove_from_cart: "cart/remove_from_cart",
			toggle_favorited: "products/toggle_favorited",
			// toggle_cart: 'products/toggle_cart',
			get_auth_user: "auth/get_auth_user",
			callback_request: "other_requests/callback_request",
			set_products_filters: "products/set_filters",
			// show_overlay: 'global/show_overlay',
		}),

		/*changeRoute(data) {
				console.log(data)
				this.$router.push({ name: 'catalog', params: { 'catalog': data.path, catId: data.catId } })
			},*/

		overlayClick() {
			this.authModalShow = !this.authModalShow;
			this.overlay.show = false;
		},

		toggleAuthModal(options) {
			// console.log(action)
			if (this.isMobile) {
				let show = options && options.action != undefined ? 
					options.action :
					!this.authModalShow;
				this.authModalShow = show;
				this.overlay.show = this.authModalShow;

				const type = this.authModalShow ? "add" : "remove";
				document.body.classList[type]("js_overflowHidden");
			}
		},
		handleLinkClick() {
			this.closeHoverMenues = true;

			setTimeout(() => {
				this.closeHoverMenues = false;
			}, 300);
		},

		setProductsFilters(filters, settings) {
			// console.log(filters);
			if (settings && settings.search) {
				this.isSearch = true;
			}
			this.set_products_filters({ ...this.products_filters, ...filters });
		},

		fetchProducts(filters) {
			const payload = {
				params: { ...filters },
			};
			this.fetch_products(payload);
		},

		callMe(formData) {
			this.callback_request({ data: formData });
		},

		// --------
		calcMenuHeight({ timeout }) {
			setTimeout(() => {
				const navMenuContainer = document.getElementById("navMenuContainer");
				this.submenuWrapperHeight = `${navMenuContainer.offsetHeight}px`;
				// console.log(navMenuContainer.offsetHeight)
			}, timeout || 0);
		},

		toggleMenu({ target }) {
			const button = target.closest(".menu-button");
			button.classList.toggle("active");
		},
		toggleDropdown(e) {
			dropDown(e, { onlyMobile: true });
			this.calcMenuHeight({ timeout: 300 });
		},
		openMobileMenu() {
			document.body.classList.add("js_pageOverlayOpen");
			this.mobileMenuOpen = true;
			this.calcMenuHeight({});
		},
		closeMobileMenu() {
			document.body.classList.remove("js_pageOverlayOpen");
			this.mobileMenuOpen = false;
			const openSubs = document
				.getElementById("navMenuWrapper")
				.getElementsByClassName("js_showSlide");
			for (let i = 0; i < openSubs.length; i++) {
				openSubs[i].classList.remove("js_showSlide");
			}
		},
	},

	watch: {
		products_filters(filters) {
			if (this.isSearch) {
				this.$router.push("search");

				this.isSearch = false;
				this.fetchProducts({ ...filters });
			}
		},
		cookie_hash(hash) {
			if (hash) {
				// console.
				this.fetch_cart();
				/*this.$nextTick()
						.then(() => {
							
						})*/
			}
		},
		'$route'() {
			// console.log(route)
			if (this.isMobile) {
				this.closeMobileMenu();
				this.toggleAuthModal({action: false});				
			} else {
				this.handleLinkClick();
			}
			scrollTo('mainHeader');
		}
	},

	mounted() {
		const { token, message } = getParamsFromUrl(this.$route.fullPath);

		if (this.authUser || token) {
			let payload = {};
			if (token) {
				payload.token = token;
				payload.notifyWhenSuccess = true;
			}
			// console.log(window.location.hash)
			// console.log(token)
			this.get_auth_user(payload);
		}
		if (message) {
			Notification({
				type: 'warning',
				title: decodeURI(message),
				// message: message
			});
		}
		
		if (this.cookie_hash && this.cookie_hash != 'null') {
			this.fetch_cart();
		}

		/*const actions = ['', 'fetch_favorited'];
			this.initialResponse({ action: 'fetch_cart'})
				.then(() => {
					this.doResponses({ actions: actions, params: { max: -1 } });
				})*/
		// this.initialResponses({ actions: actions, params: { max: -1 } })
		// this.fetch_catalog_items();
		// this.fetch_favorited();
		// console.log('created')
		// this.fetch_catalog_items();
	},

	beforeMount() {
		this.isMobile = document.documentElement.clientWidth < 992;
		// console.log(this.authModalShow)
	},
};
</script>
