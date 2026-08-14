  <!-- Reviews Data -->
  @php
      $reviews = [
          [
              'name' => 'MALAMA KALOWA',
              'designation' => 'Certificate III in Individual Support',
              'image' => 'teacher__1.jpg',
              'rating' => 5,
              'text' =>
                  '“Very supportive trainers and a smooth learning experience. I received great guidance throughout my course and placement. Highly recommended!”',
          ],
          [
              'name' => 'GURBRINDER SINGH DHILLON',
              'designation' => 'Certificate III in Individual Support',
              'image' => 'teacher__2.jpg',
              'rating' => 4,
              'text' =>
                  '“Great experience from start to finish. The staff were helpful and professional, and the trainers made everything easy to understand.”',
          ],
          [
              'name' => 'HARSH HITENDRAKUMAR JAISWAL',
              'designation' => 'Certificate III in Individual Support',
              'image' => 'teacher__3.jpg',
              'rating' => 5,
              'text' =>
                  '“I really enjoyed my course with LIA. The team was friendly and supportive, and I received excellent guidance throughout my studies.”',
          ],
          [
              'name' => 'REBECCA ANNE RUSSELL',
              'designation' => 'Certificate III in Individual Support',
              'image' => 'teacher__4.jpg',
              'rating' => 4,
              'text' =>
                  '“A great experience completing my course. The trainers were knowledgeable and supportive, and the course was practical and well organised.”',
          ],
          [
              'name' => 'MARIE CECILIA LAUVAO ALATOA',
              'designation' => 'Certificate III in Individual Support',
              'image' => 'teacher__1.jpg',
              'rating' => 5,
              'text' =>
                  '“The trainers were patient and supportive throughout my course. I really appreciated their guidance and help with the placement process.”',
          ],
          [
              'name' => 'PATRICIA KAREN VIJANDRE NAEL',
              'designation' => 'Certificate III in Individual Support',
              'image' => 'teacher__2.jpg',
              'rating' => 4,
              'text' =>
                  '“Very happy with my experience at LIA. The staff were professional, friendly and supportive throughout my course. I would highly recommend them.”',
          ],
          [
              'name' => 'JESSICA WILLIAMS',
              'designation' => 'Certificate III in Individual Support',
              'image' => 'teacher__3.jpg',
              'rating' => 5,
              'text' =>
                  '“I had a great experience completing my Certificate III in Individual Support. The trainers were very supportive and made the learning process easy to understand. The team was always helpful whenever I needed assistance.”',
          ],
          [
              'name' => 'DANIEL KUMAR',
              'designation' => 'Certificate III in Individual Support',
              'image' => 'teacher__4.jpg',
              'rating' => 4,
              'text' =>
                  '“The course was well organised and the staff were very professional. I received excellent support throughout my studies and gained valuable knowledge that I can use in my career. Highly recommended.”',
          ],
          [
              'name' => 'SOPHIA MARTIN',
              'designation' => 'Certificate III in Individual Support',
              'image' => 'teacher__1.jpg',
              'rating' => 5,
              'text' =>
                  '“I really enjoyed studying with Leadership Institute Australia. The trainers were friendly, patient and always willing to help. I especially appreciated the guidance throughout the course and placement.”',
          ],
          [
              'name' => 'MICHAEL THOMPSON',
              'designation' => 'Certificate III in Individual Support',
              'image' => 'teacher__2.jpg',
              'rating' => 4,
              'text' =>
                  '“A very positive learning experience. Everything was explained clearly, and the staff were available whenever I had questions. I would definitely recommend LIA to anyone looking to enter the care industry.”',
          ],
          [
              'name' => 'PRIYA SHARMA',
              'designation' => 'Certificate III in Individual Support',
              'image' => 'teacher__3.jpg',
              'rating' => 5,
              'text' =>
                  '“The whole process was smooth and professional. The trainers provided great guidance and support throughout my studies. I feel much more confident about starting my career in aged care.”',
          ],
          [
              'name' => 'AMANDA JOHNSON',
              'designation' => 'Certificate III in Individual Support',
              'image' => 'teacher__4.jpg',
              'rating' => 4,
              'text' =>
                  '“I am very happy with my experience at LIA. The course was practical, well structured and supported by helpful trainers. The team made the learning journey much easier for me.”',
          ],
          [
              'name' => 'MOHAMMED RAHMAN',
              'designation' => 'Certificate III in Individual Support',
              'image' => 'teacher__1.jpg',
              'rating' => 5,
              'text' =>
                  '“Excellent support from the team throughout my course. The trainers were knowledgeable and approachable, and I always received help when I needed it. Great experience overall.”',
          ],
          [
              'name' => 'EMILY ANDERSON',
              'designation' => 'Certificate III in Individual Support',
              'image' => 'teacher__2.jpg',
              'rating' => 4,
              'text' =>
                  '“I really appreciated the support I received during my course. The learning materials were easy to follow and the trainers were very helpful. I would recommend LIA to others looking to develop their career in individual support.”',
          ],
      ];
  @endphp

  <section class="bg-gray-50 py-10 sm:py-12 lg:py-16">
      <div class="max-w-7xl mx-auto px-5 md:px-8">
          <!-- Heading -->
          <div class="text-center md:mb-8 mb-4">
              <h2
                  class="lg:text-6xl font-headline-lg md:text-5xl sm:text-4xl text-3xl font-bold text-on-surface mb-2 text-center">
                  Our Student Stories
              </h2>
              <p class="text-on-surface-variant max-w-xl mx-auto text-sm md:text-base mb-12">Hear from our students
                  about their journey and success stories.</p>
              <!-- Slider -->
              <div class="relative">
                  <div class="swiper student-stories-swiper">
                      <div class="swiper-wrapper">
                          @foreach ($reviews as $review)
                              <div class="swiper-slide h-auto">
                                  <div
                                      class="bg-white rounded-md border border-slate-200 shadow-sm  p-5 sm:p-6 lg:p-7  flex flex-col h-full">

                                      <!-- Stars -->
                                      <div class="flex items-center justify-center gap-1 mb-4">
                                          @for ($i = 1; $i <= 5; $i++)
                                              @if ($i <= $review['rating'])
                                                  <span class="text-yellow-500 text-sm sm:text-xl">★</span>
                                              @else
                                                  <span class="text-yellow-500 text-sm sm:text-xl">☆</span>
                                              @endif
                                          @endfor
                                      </div>

                                      <!-- Text -->
                                      <p
                                          class="text-gray-600 text-sm sm:text-base leading-relaxed mb-6 flexgrow line-clamp-2">
                                          {{ $review['text'] }}
                                      </p>

                                      <!-- Author -->
                                      <div class="flex items-center justify-between mt-auto">

                                          <div class="flex items-center gap-3">

                                              <div>
                                                  <h5 class="font-semibold text-gray-900 text-sm">
                                                      {{ $review['name'] }}
                                                  </h5>
                                                  <span class="text-gray-500 text-xs sm:text-sm">
                                                      {{ $review['designation'] }}
                                                  </span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endforeach
                      </div>
                      <!-- Pagination -->
                      <div class="swiper-pagination"></div>
                  </div>
              </div>

          </div>

      </div>
  </section>
