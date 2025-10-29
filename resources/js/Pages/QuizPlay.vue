
<template>
    <div>
      <h1 class="text-2xl font-bold mb-4">{{ quiz.title }}</h1>
  
      <!-- Show all questions -->
      <div v-if="quiz.display_mode === 'all'">
        <div v-for="(question, index) in quiz.questions" :key="question.id" class="mb-6">
          <QuestionCard
            :question="question"
            :index="index + 1"
            v-model="answers[question.id]"
          />
        </div>
  
        <button @click="submit" class="btn-primary">Submit All</button>
      </div>
  
      <!-- Show one-by-one question -->
      <div v-else>
        <QuestionCard
          :question="quiz.questions[currentIndex]"
          :index="currentIndex + 1"
          v-model="answers[quiz.questions[currentIndex].id]"
        />
  
        <div class="mt-4 flex justify-between">
          <button
            v-if="currentIndex > 0"
            @click="currentIndex--"
            class="btn-secondary"
          >
            Previous
          </button>
  
          <button
            v-if="currentIndex < quiz.questions.length - 1"
            @click="currentIndex++"
            class="btn-primary"
          >
            Next
          </button>
  
          <button
            v-else
            @click="submit"
            class="btn-primary"
          >
            Finish
          </button>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import QuestionCard from '@/Components/QuestionCard.vue'
  
  const props = defineProps({
    quiz: Object,
  })
  
  const currentIndex = ref(0)
  const answers = ref({})
  const submit = () => {
    console.log('Submitted answers:', answers.value)
    // Use Inertia.post('/quizzes/submit', { quiz_id: quiz.id, answers: answers.value })
  }
  </script>