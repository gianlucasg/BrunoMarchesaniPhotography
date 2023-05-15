<template>
    <button :type="type"
	:style="{'background-color':this.color}"
	class="inline-flex items-center
	px-4 py-2 bg-white border
	border-gray-300 rounded-md
	font-semibold text-xs text-gray-700
	uppercase tracking-widest shadow-sm hover:text-gray-500
	focus:border-blue-300 focus:shadow-outline-blue
	focus:outline-none
	active:text-gray-800 active:bg-gray-50
	text-gray-800
	transition ease-in-out duration-150">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            color:String,
            type: {
                type: String,
                default: 'button',
            },
        }
    }
</script>
