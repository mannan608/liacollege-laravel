<form class="space-y-5" action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="form_type" value="replecement">
                    <div>
                        <x-form.input-text name="name" label="Full Name" value=""
                            placeholder="Enter Full Name..." />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-form.input-text name="email" label="Email" type="email" value=""
                                placeholder="Enter Email..." />
                        </div>
                        <div>
                            <x-form.input-text name="phone" label="Phone" value=""
                                placeholder="Enter Phone No..." />
                        </div>
                    </div>
                    <div>
                        <x-form.input-text name="address" label="Road / Street Name" type="text" value=""
                            placeholder="Enter Road / Street Name..." />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-form.input-text name="state" label="State" type="text" value=""
                                placeholder="Enter State..." />
                        </div>
                        <div>
                            <x-form.input-text name="post_code" label="Post Code" value=""
                                placeholder="Enter Post Code..." />
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-brand-500 text-on-primary hover:bg-brand-500  py-3.5 rounded-2xl mt-4">
                        Submit enquiry
                    </button>
                    <p class="text-xs text-center text-on-surface-variant/70 mt-4">By submitting, you agree to our
                        Privacy Policy.</p>
                </form>