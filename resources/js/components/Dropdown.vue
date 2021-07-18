<template>
    <div>
        <div class="relative" v-on-clickaway="hideMenu">
            <!-- Trigger -->
            <div>
                <button class="text-gray-600 flex items-center hover:text-gray-900 transition" @click="showMenu = !showMenu">
                    <div>
                        <slot name="trigger"></slot>
                    </div>
                    <div class="ml-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </button>
            </div>

            <!-- Menu -->
            <transition
                enter-active-class="transition duration-200 transform"
                enter-class="opacity-0 scale-95"
                enter-to-class="opacity-1 scale-100"
                leave-active-class="transition duration-200 transform"
                leave-class="opacity-1 scale-100"
                leave-to-class="opacity-0 scale-95"
            >
                <div
                    v-show="showMenu"
                    :class="classes"
                    class="absolute bg-white border border-gray-100 rounded-lg w-48 py-1 shadow-md mt-2 text-gray-600"
                >
                    <slot></slot>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
    import {mixin as clickaway} from 'vue-clickaway';
    export default {
        props: {
            align: {
                default: 'left'
            },
            width: {
                default: '48'
            }
        },
        mixins: [clickaway],
        data() {
            return {
                showMenu: false
            };
        },

        methods: {
            hideMenu() {
                this.showMenu = false;
            }
        },

        computed: {
            classes() {
                let alignmentClasses = this.align == 'left' ? 'left-0 origin-left' : 'right-0 origin-right';
                let contentWidth = 'w-' + this.width;

                return `${alignmentClasses} ${contentWidth}`;
            }
        }
    }
</script>
