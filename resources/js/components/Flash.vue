<template>
	<transition
		appear
		enter-active-class="transition ease-in-out transform"
		enter-class="opacity-0 translate-x-16"
		enter-to-class="opacity-100 translate-x-0"
		leave-class="opacity-100 translate-x-0"
		leave-to-class="opacity-0 translate-x-16"
		leave-active-class="transition ease-in-out transform"
	>
		<div
			class="
				max-w-md
				fixed
				z-50
				right-5
				bottom-5
				w-full
				shadow-md
				rounded-md
				bg-green-50
				border-green-400 border-2
			"
			v-show="show"
		>
			<div class="flex justify-between items-center px-3 py-5">
				<p>{{ body }}</p>
				<div class="text-gray-600 cursor-pointer ml-1" @click="show = false">
					<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
				</div>
			</div>
		</div>
	</transition>
</template>

<script>
	export default {
		props: ['message'],

		data() {
			return {
				body: '',
				show: false
			}
		},

		created() {
			if (this.message) {
				this.flash(this.message);
			}

			window.events.$on('flash', message => this.flash(message));
		},

		methods: {
			flash(message) {
				this.body = message;
				this.show = true;

				this.hide()
			},

			hide() {
				setTimeout(() => this.show = false, 3000);
			}
		}
	}
</script>
