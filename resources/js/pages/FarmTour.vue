<template>
  <MainLayout>
    <div class="min-h-screen bg-gray-50">
      <!-- Intro -->
      <section class="bg-gray-50 text-gray-800 overflow-hidden">
        <div class="max-w-6xl mx-auto px-6 py-20 text-center">
          <h2 class="text-3xl font-semibold text-green-800 mb-6">
            Mengenal Lebih Dekat Dunia Jamur
          </h2>
          <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed">
            Farm tour kami dirancang untuk membawa Anda menyelami perjalanan jamur tiram dari awal hingga akhir.
            Tidak hanya melihat prosesnya, tetapi juga memahami filosofi kami:
            menanam dengan hati, merawat dengan ilmu, dan panen dengan kebanggaan.
          </p>
        </div>

        <!-- Farm Tour Steps -->
        <div
          v-for="(step, index) in farmTours"
          :key="step.id"
          :class="[
            'grid md:grid-cols-2 items-center gap-10 px-6 md:px-16 py-16',
            index % 2 !== 0 ? 'bg-gray-100' : 'bg-white'
          ]"
        >
          <!-- Image -->
          <div :class="['w-full', index % 2 !== 0 ? 'md:order-2' : '']">
            <div class="w-full h-80 md:h-[400px] rounded-2xl overflow-hidden shadow-lg">
              <img
                :src="step.image"
                :alt="step.name"
                class="w-full h-full object-cover"
              />
            </div>
          </div>

          <!-- Text -->
          <div :class="[index % 2 !== 0 ? 'md:order-1' : '']">
            <h3 class="text-2xl font-semibold text-green-800 mb-4">
              {{ index + 1 }}. {{ step.name }}
            </h3>
            <p class="text-gray-600 leading-relaxed text-lg">
              {{ step.description }}
            </p>
          </div>
        </div>
      </section>

      <!-- CTA -->
      <section class="py-16 bg-green-800 text-white">
        <div class="container mx-auto px-6 text-center">
          <h2 class="text-4xl font-bold mb-4">Ayo Jadwalkan Kunjungan!</h2>
          <p class="mb-8 text-lg text-gray-200 max-w-2xl mx-auto">
            Bergabunglah bersama kami untuk wisata edukasi di kebun sehat & alami!
          </p>
          <a
            href="#"
            @click.prevent="goToWhatsApp('farm_tour')"
            class="border-2 border-white px-8 py-4 rounded-full font-bold hover:bg-white hover:text-green-800 transition duration-300"
          >
            Hubungi via Whatsapp
          </a>
        </div>
      </section>
    </div>
  </MainLayout>
</template>

<script setup>
import axios from 'axios'
import MainLayout from '@/layouts/MainLayout.vue'
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const waNumber = computed(() => page.props.wa_number);
const page = usePage();

const { props } = usePage()

const farmTours = computed(() => props.farmTours)

const goToWhatsApp = async (sourcePage = 'layout', productId = null) => {
  try {
    await axios.post('/click-log', {
      source_page: sourcePage,
      product_id: productId,
    })
  } catch (e) {
    console.error('Click log failed', e)
  } finally {
    const phone = waNumber.value?.replace(/^0/, '62')
    const text = encodeURIComponent(
      'Halo, saya ingin bertanya mengenai Jamur'
    )

    window.open(`https://wa.me/${phone}?text=${text}`, '_blank')
  }
}
</script>

<style scoped>
img {
  transition: transform 0.5s ease;
}

img:hover {
  transform: scale(1.02);
}
</style>
