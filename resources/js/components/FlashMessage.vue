<template>
	<transition name="fade">
		<div class="notification is-success" v-show="visible">
			<button class="delete" @click="hide"></button>
			{{ message }}
		</div>
	</transition>
</template>

<script>
import { getCurrentInstance } from 'vue';

export default {
	props: ['text'],

	data() {
		return {
			visible: false,
			message: ""
		}
	},

	created() {
		if (this.text) {
			this.message = this.text;
			this.show();
		}

		const { proxy } = getCurrentInstance();

		this.handleFlashMessage = (message) => {
			this.message = message;
			this.show();
		};
		proxy.$eventBus.on("flash", this.handleFlashMessage);
	},

	beforeUnmount() {
		const { proxy } = getCurrentInstance();
		proxy.$eventBus.off("flash", this.handleFlashMessage);
	},

	methods: {
		show() {
			this.visible = true;
			setTimeout(() => this.hide(), 3000);
		},

		hide() {
			this.visible = false;
		}
	}
}
</script>

<style lang="scss" scoped>
.notification {
	font-size: 1.2rem;
	position: fixed;
	right: 2em;
	bottom: 2em;
}

.fade-enter-active,
.fade-leave-active {
	transition: opacity 0.35s;
}

.fade-enter,
.fade-leave-to {
	opacity: 0;
}
</style>
