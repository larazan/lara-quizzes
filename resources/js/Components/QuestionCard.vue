<template>
    <motion-div
      v-motion
      :initial="{ opacity: 0, y: 30 }"
      :enter="{ opacity: 1, y: 0, transition: { duration: 0.4 } }"
      class="w-full bg-white/10 backdrop-blur-xl rounded-2xl shadow-xl p-6"
    >
      <!-- Question Header -->
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg md:text-xl font-bold text-white">
          {{ question.question_text }}
        </h2>
  
        <div v-if="showTimer && timeLeft > 0" class="text-yellow-400 font-semibold text-sm">
          ⏳ {{ timeLeft }}s
        </div>
      </div>
  
      <!-- Image (optional) -->
      <div v-if="question.image_path" class="mb-4">
        <img
          :src="question.image_path"
          alt="Question image"
          class="rounded-xl w-full max-h-60 object-contain border border-white/20"
        />
      </div>
  
      <!-- Options -->
      <div class="grid gap-3">
        <button
          v-for="opt in question.options"
          :key="opt.id"
          @click="selectOption(opt.id)"
          :disabled="isAnswered"
          class="w-full py-3 px-4 rounded-xl text-left font-medium border transition-all duration-200"
          :class="buttonClass(opt.id)"
        >
          <span class="mr-2 font-bold">{{ opt.label }}.</span> {{ opt.text }}
        </button>
      </div>
    </motion-div>
  </template>
  
  <script setup>
  import { ref, onMounted, onBeforeUnmount, watch } from 'vue'
  import { useMotion } from '@vueuse/motion'
  
  // Props
  const props = defineProps({
    question: Object,
    value: Number, // selected option_id (v-model)
    timeLimit: Number,
    showTimer: { type: Boolean, default: false },
    autoSubmit: { type: Boolean, default: false },
  })
  
  // Emits
  const emit = defineEmits(['update:value', 'time-expired', 'answered'])
  
  // State
  const timeLeft = ref(props.timeLimit ?? 0)
  let timer = null
  const isAnswered = ref(false)
  
  // Auto start timer
  onMounted(() => {
    if (props.showTimer && props.timeLimit) startTimer()
  })
  onBeforeUnmount(() => clearInterval(timer))
  
  watch(() => props.question.id, () => {
    resetTimer()
  })
  
  // Timer logic
  const startTimer = () => {
    timeLeft.value = props.timeLimit
    clearInterval(timer)
    timer = setInterval(() => {
      if (timeLeft.value > 0) {
        timeLeft.value--
      } else {
        clearInterval(timer)
        emit('time-expired', props.question.id)
        if (props.autoSubmit) isAnswered.value = true
      }
    }, 1000)
  }
  
  const resetTimer = () => {
    isAnswered.value = false
    clearInterval(timer)
    if (props.showTimer && props.timeLimit) startTimer()
  }
  
  // Option click
  const selectOption = (optionId) => {
    if (isAnswered.value) return
    isAnswered.value = true
    emit('update:value', optionId)
    emit('answered', { question_id: props.question.id, option_id: optionId })
    clearInterval(timer)
  }
  
  // Dynamic styling
  const buttonClass = (optId) => {
    if (!isAnswered.value) {
      return 'bg-white/20 hover:bg-white/40 text-white border-white/10'
    }
    return optId === props.value
      ? 'bg-yellow-400 text-black border-yellow-300 scale-[1.02]'
      : 'bg-white/10 text-gray-400 border-white/10'
  }
  </script>
  
  <style scoped>
  button {
    transition: all 0.25s ease;
  }
  </style>
  