<template>
    <div class="max-w-xl mx-auto my-6 pb-4">
        <div class="flex pb-3">
            <div class="flex-1"></div>

            <template v-for="(step, index) in steps">
                <div class="flex-1">
                    <div :class="[index <= stepIndex ? 'bg-green' : 'bg-white border-2 border-grey-light']" class="w-10 h-10  mx-auto rounded-full text-lg text-white flex items-center">
                        <span v-if="index < stepIndex" class="text-white text-center w-full">
                            <font-awesome-icon icon="check" class="w-full fill-current white"/>
                        </span>
                        <span v-else-if="stepIndex === index" class="text-white text-center w-full">
                            <font-awesome-icon icon="spinner" class="w-full fill-current white fa-spin"/>
                        </span>
                        <span v-else class="text-grey-darker text-center w-full">{{ index + 1 }}</span>
                    </div>

                    <div class="text-xs text-center pt-3">
                        {{ step }}
                    </div>
                </div>

                <div v-if="index != (steps.length - 1)" class="w-1/6 align-center items-center align-middle content-center flex">
                    <div class="w-full bg-grey-light rounded items-center align-middle align-center flex-1">
                        <div class="bg-green-light text-xs leading-none py-1 text-center text-grey-darkest rounded" :style="{width: (index < stepIndex) * 100 + '%'}"></div>
                    </div>
                </div>
            </template>

            <div class="flex-1"></div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            stepIndex: {
                type: Number,
                default: 1
            },
            steps: {
                type: Array,
                required: true
            }
        },

        data() {
            return {}
        }
    }
</script>
