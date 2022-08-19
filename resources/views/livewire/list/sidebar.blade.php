<div class="space-y-8">
    <!-- Alert -->
    <x-unit.newsletter-signup />

    <!-- White box -->
    <div class="bg-white shadow-lg rounded-sm border border-slate-200 p-5 min-w-60">
        <div class="grid md:grid-cols-2 xl:grid-cols-1 gap-6">
            <!-- Group 1 -->
            <div>
                <div class="text-sm text-slate-800 font-semibold mb-3">Checkbox example</div>
                <ul class="space-y-2">
                    <li>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" checked />
                            <span class="text-sm text-slate-600 font-medium ml-2">Programming</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" />
                            <span class="text-sm text-slate-600 font-medium ml-2">Design</span>
                        </label>
                    </li>
                </ul>
            </div>
            <!-- Group 2 -->
            <div>
                <div class="text-sm text-slate-800 font-semibold mb-3">Toggle example</div>
                <div class="flex items-center" x-data="{ checked: true }">
                    <div class="form-switch">
                        <input type="checkbox" id="company-toggle" class="sr-only" x-model="checked" />
                        <label class="bg-slate-400" for="company-toggle">
                            <span class="bg-white shadow-sm" aria-hidden="true"></span>
                            <span class="sr-only">Company Culture</span>
                        </label>
                    </div>
                    <div class="text-sm text-slate-400 italic ml-2" x-text="checked ? 'On' : 'Off'">
                    </div>
                </div>
                <div class="text-sm italic mt-3">Only show companies that are creating a positive
                    culture</div>
            </div>
        </div>
    </div>
</div>
