<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noor Zakat Calculator</title>

    <!-- Bootstrap 5.3.x (latest 5.x stable CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --zakat-green-900: #0f4f3a;
            --zakat-green-800: #1c6d4d;
            --zakat-green-700: #258354;
            --zakat-green-600: #2f8f62;
            --zakat-green-500: #35a26f;
            --zakat-green-300: #95c8af;
            --zakat-mint-100: #eff7f2;
            --zakat-surface: #f6f8f7;
            --zakat-border: #d8e3dc;
            --zakat-text: #22463b;
            --zakat-muted: #6c8d7e;
            --zakat-gold: #ffc928;
        }

        body {
            font-family: "Inter", "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: var(--zakat-text);
            background: #f1f4f2;
        }

        .zakat-hero {
            position: relative;
            background:
                linear-gradient(180deg, rgba(8, 47, 34, 0.84), rgba(28, 97, 70, 0.85)),
                radial-gradient(circle at 10% 20%, rgba(255, 255, 255, 0.26), transparent 46%),
                radial-gradient(circle at 80% 12%, rgba(255, 255, 255, 0.16), transparent 48%),
                url("https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=1800&q=80") center/cover no-repeat;
            min-height: 320px;
            padding-top: 72px;
            padding-bottom: 112px;
            overflow: hidden;
        }

        .zakat-hero::after {
            content: "";
            position: absolute;
            inset: auto 0 0 0;
            height: 120px;
            background: linear-gradient(to bottom, rgba(241, 244, 242, 0), rgba(241, 244, 242, 1));
        }

        .zakat-pill {
            background-color: rgba(76, 165, 117, 0.24);
            color: #eaf8ef;
            letter-spacing: 0.08em;
            font-size: 0.78rem;
            font-weight: 700;
            border-radius: 999px;
            text-transform: uppercase;
            display: inline-block;
            padding: 0.5rem 1rem;
        }

        .zakat-title {
            font-family: "Georgia", "Times New Roman", serif;
            font-size: clamp(2.35rem, 4.5vw, 4rem);
            color: #ecf6f1;
            margin-top: 1.15rem;
            margin-bottom: 0.5rem;
            line-height: 1.08;
        }

        .zakat-subtitle {
            max-width: 640px;
            margin-inline: auto;
            font-size: 1.5rem;
            color: rgba(236, 246, 241, 0.82);
            font-weight: 300;
            line-height: 1.28;
        }

        .zakat-layout {
            margin-top: -74px;
            position: relative;
            z-index: 2;
        }

        .zakat-card {
            border: 1px solid #dfe8e3;
            border-radius: 14px;
            background: #fbfcfb;
            box-shadow: 0 8px 20px rgba(17, 45, 33, 0.08);
        }

        .zakat-card-body {
            padding: 1.4rem 1.5rem;
        }

        .zakat-heading {
            color: #24754f;
            font-family: "Georgia", "Times New Roman", serif;
            font-size: clamp(2rem, 4vw, 3rem);
            margin-bottom: 0.3rem;
        }

        .zakat-helper {
            color: #447765;
            font-size: 1.05rem;
            margin-bottom: 1rem;
        }

        .asset-group {
            border: 1px solid #e0e9e3;
            border-radius: 12px;
            padding: 0.85rem;
            background-color: #fff;
        }

        .asset-toggle {
            width: 100%;
            background: transparent;
            border: 0;
            text-align: left;
            padding: 0.35rem 0.1rem;
        }

        .asset-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #e8f4ed;
            color: #22794f;
            flex-shrink: 0;
        }

        .asset-title {
            font-size: 2rem;
            line-height: 1.05;
            margin-bottom: 0.25rem;
            font-family: "Georgia", "Times New Roman", serif;
            color: #22392f;
        }

        .asset-rate {
            color: #4d8f74;
            font-size: 1.15rem;
            font-weight: 500;
        }

        .asset-note {
            border-radius: 6px;
            background: #edf2ef;
            color: #55786a;
            padding: 0.85rem 1rem;
            font-size: 1rem;
            margin-bottom: 0.95rem;
        }

        .form-label {
            color: #5f8274;
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
        }

        .form-control {
            border-color: #d6e1da;
            color: #2d5346;
            font-size: 1rem;
            height: 42px;
        }

        .input-group-text {
            border-color: #d6e1da;
            background: #f8fbf9;
            color: #5e8374;
            font-weight: 600;
        }

        .delete-entry-btn {
            width: 42px;
            height: 42px;
            border: 0;
            background: transparent;
            color: #d74545;
            font-size: 1.2rem;
        }

        .add-entry-btn {
            border: 1px dashed #9fc5b0;
            color: #387b5b;
            font-weight: 500;
            background: #fdfefd;
        }

        .summary-card {
            border-radius: 16px;
            overflow: hidden;
            background: linear-gradient(145deg, #0f6c47 0%, #0b5e3e 60%, #094e34 100%);
            color: #e7f6ef;
            position: sticky;
            top: 1.25rem;
        }

        .summary-card .label {
            font-size: 0.96rem;
            color: rgba(231, 246, 239, 0.9);
            font-weight: 600;
            margin-bottom: 0.3rem;
        }

        .summary-amount {
            font-size: clamp(2.15rem, 3.8vw, 3.1rem);
            font-family: "Georgia", serif;
            line-height: 1;
            margin-bottom: 0.95rem;
        }

        .summary-amount-gold {
            color: var(--zakat-gold);
        }

        .summary-divider {
            border-color: rgba(255, 255, 255, 0.2);
        }

        .summary-note {
            font-size: 0.87rem;
            color: rgba(229, 245, 237, 0.85);
            margin-bottom: 1.25rem;
        }

        .save-btn {
            background: var(--zakat-gold);
            color: #214d3b;
            font-weight: 700;
            border: 0;
            border-radius: 9px;
            min-height: 52px;
        }

        .breakdown-card {
            border: 1px solid #d5dfd8;
            background: #f8faf9;
            border-radius: 14px;
            min-height: 300px;
        }

        .breakdown-title {
            font-family: "Georgia", serif;
            color: #2a5648;
            font-size: 2rem;
        }

        .footer-bar {
            margin-top: 4rem;
            background: #137247;
            color: #d6eee2;
            padding: 2.6rem 0 2.2rem;
        }

        .footer-brand {
            font-family: "Georgia", serif;
            font-size: 2rem;
            margin-bottom: 0.2rem;
        }

        .footer-sub {
            font-size: 1.05rem;
        }

        .footer-copy {
            font-size: 0.9rem;
            color: rgba(214, 238, 226, 0.82);
        }

        @media (max-width: 991.98px) {
            .zakat-layout {
                margin-top: -64px;
            }

            .summary-card {
                position: static;
            }

            .asset-title {
                font-size: 1.7rem;
            }
        }

        @media (max-width: 575.98px) {
            .zakat-card-body {
                padding: 1rem;
            }

            .asset-group {
                padding: 0.7rem;
            }

            .zakat-subtitle {
                font-size: 1.2rem;
            }

            .asset-title {
                font-size: 1.45rem;
            }
        }
    </style>
</head>
<body>
<section class="zakat-hero text-center">
    <div class="container">
        <span class="zakat-pill">Complete Zakat Guide</span>
        <h1 class="zakat-title">Noor Zakat Calculator</h1>
        <p class="zakat-subtitle">Purify your wealth with precision. A simple, secure, and accurate way to calculate your obligations.</p>
    </div>
</section>

<main class="container zakat-layout pb-5" id="zakatCalculatorRoot">
    <div class="row g-4 align-items-start">
        <div class="col-lg-8">
            <section class="zakat-card" aria-labelledby="assetsHeading">
                <div class="zakat-card-body">
                    <h2 class="zakat-heading" id="assetsHeading">Your Assets</h2>
                    <p class="zakat-helper">Enter your assets below. The calculator will apply the correct Zakat rates automatically.</p>

                    <div class="d-grid gap-3" id="assetAccordion">
                        @php
                            $assetSections = [
                                ['key' => 'wealthCash', 'icon' => 'bi-wallet2', 'name' => 'Wealth & Cash', 'rate' => '2.5%', 'note' => 'Gold, Silver, Cash on hand, Bank savings, and other liquid assets held for one lunar year.', 'rows' => ['Cash on Hand', 'Bank Savings', 'Gold & Silver Value']],
                                ['key' => 'businessTrade', 'icon' => 'bi-shop', 'name' => 'Business & Trade Goods', 'rate' => '2.5%', 'note' => 'Current value of trade goods, merchandise, and business assets intended for sale.', 'rows' => ['Value of Stock', 'Cash in Business']],
                                ['key' => 'agriculture', 'icon' => 'bi-flower1', 'name' => 'Agricultural Produce', 'rate' => '10.0%', 'note' => null, 'rows' => []],
                                ['key' => 'livestock', 'icon' => 'bi-record-circle', 'name' => 'Livestock & Animals', 'rate' => '2.5%', 'note' => null, 'rows' => []],
                                ['key' => 'minerals', 'icon' => 'bi-tools', 'name' => 'Minerals & Natural Resources', 'rate' => '20.0%', 'note' => null, 'rows' => []],
                                ['key' => 'income', 'icon' => 'bi-currency-dollar', 'name' => 'Income & Salaries', 'rate' => '2.5%', 'note' => null, 'rows' => []],
                                ['key' => 'foundWealth', 'icon' => 'bi-gem', 'name' => 'Found Wealth (Ghanimah)', 'rate' => '20.0%', 'note' => 'Treasure or wealth found (buried treasure of pre-Islamic era).', 'rows' => ['Found Value']],
                            ];
                        @endphp

                        @foreach ($assetSections as $index => $section)
                            @php
                                $isOpen = in_array($section['key'], ['wealthCash', 'businessTrade', 'foundWealth'], true);
                            @endphp
                            <article class="asset-group">
                                <button
                                    class="asset-toggle"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse-{{ $section['key'] }}"
                                    aria-expanded="{{ $isOpen ? 'true' : 'false' }}"
                                    aria-controls="collapse-{{ $section['key'] }}"
                                >
                                    <div class="d-flex align-items-start justify-content-between">
                                        <div class="d-flex gap-3 align-items-start">
                                            <span class="asset-icon"><i class="bi {{ $section['icon'] }}"></i></span>
                                            <div>
                                                <h3 class="asset-title">{{ $section['name'] }}</h3>
                                                <p class="asset-rate mb-0">Rate: {{ $section['rate'] }}</p>
                                            </div>
                                        </div>
                                        <span class="text-success pt-2"><i class="bi bi-chevron-{{ $isOpen ? 'up' : 'down' }}"></i></span>
                                    </div>
                                </button>

                                <div class="collapse {{ $isOpen ? 'show' : '' }} mt-2" id="collapse-{{ $section['key'] }}" data-bs-parent="#assetAccordion">
                                    @if ($section['note'])
                                        <p class="asset-note">{{ $section['note'] }}</p>
                                    @endif

                                    @foreach ($section['rows'] as $row)
                                        <div class="row g-2 align-items-end mb-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Description</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    value="{{ $row }}"
                                                    wire:model.defer="assets.{{ $section['key'] }}.{{ \Illuminate\Support\Str::slug($row, '_') }}.description"
                                                >
                                            </div>
                                            <div class="col-md-5">
                                                <label class="form-label">Amount</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">$</span>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        value="0"
                                                        min="0"
                                                        step="0.01"
                                                        wire:model.defer="assets.{{ $section['key'] }}.{{ \Illuminate\Support\Str::slug($row, '_') }}.amount"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-1 text-md-end text-start">
                                                <button class="delete-entry-btn" type="button" aria-label="Delete entry">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if (!empty($section['rows']))
                                        <button type="button" class="btn add-entry-btn w-100 mt-2">
                                            <i class="bi bi-plus-lg me-2"></i>
                                            Add {{ $section['name'] }} Entry
                                        </button>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>

        <div class="col-lg-4">
            <aside class="d-grid gap-4">
                <section class="summary-card p-4">
                    <h2 class="h4 fw-bold mb-3 text-uppercase">Summary</h2>
                    <p class="label">Total Assets Declared</p>
                    <p class="summary-amount">$0</p>

                    <hr class="summary-divider my-3">

                    <p class="label">Total Zakat Payable</p>
                    <p class="summary-amount summary-amount-gold">$0</p>
                    <p class="summary-note">*Calculated based on specified rates for each category.</p>
                    <button type="button" class="btn save-btn w-100">
                        Save Calculation <i class="bi bi-arrow-right ms-2"></i>
                    </button>
                </section>

                <section class="breakdown-card p-4 d-flex flex-column">
                    <h2 class="breakdown-title">Breakdown</h2>
                    <p class="text-center text-success-emphasis mt-5">No assets entered yet.</p>
                </section>
            </aside>
        </div>
    </div>
</main>

<footer class="footer-bar">
    <div class="container text-center">
        <h2 class="footer-brand">Noor Zakat</h2>
        <p class="footer-sub mb-3">Purifying wealth, purifying hearts.</p>
        <p class="footer-copy mb-0">© 2025 Noor Zakat Calculator. All calculations should be verified with a scholar if in doubt.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    (() => {
        const selector = '[data-bs-toggle="collapse"]';

        const syncChevronState = (toggleButton, isExpanded) => {
            const icon = toggleButton.querySelector('.bi-chevron-down, .bi-chevron-up');
            if (!icon) return;

            icon.classList.toggle('bi-chevron-up', isExpanded);
            icon.classList.toggle('bi-chevron-down', !isExpanded);
        };

        const initializeBootstrapComponents = (root = document) => {
            root.querySelectorAll(selector).forEach((toggleButton) => {
                if (toggleButton.dataset.bsCollapseBound === 'true') return;

                const targetSelector = toggleButton.getAttribute('data-bs-target');
                if (!targetSelector) return;

                const targetElement = document.querySelector(targetSelector);
                if (!targetElement) return;

                bootstrap.Collapse.getOrCreateInstance(targetElement, { toggle: false });
                syncChevronState(toggleButton, toggleButton.getAttribute('aria-expanded') === 'true');

                targetElement.addEventListener('shown.bs.collapse', () => syncChevronState(toggleButton, true));
                targetElement.addEventListener('hidden.bs.collapse', () => syncChevronState(toggleButton, false));

                toggleButton.dataset.bsCollapseBound = 'true';
            });
        };

        document.addEventListener('DOMContentLoaded', () => initializeBootstrapComponents());

        document.addEventListener('livewire:load', () => {
            initializeBootstrapComponents();

            if (window.Livewire?.hook) {
                window.Livewire.hook('message.processed', (_message, component) => {
                    initializeBootstrapComponents(component?.el || document);
                });
            }

            document.addEventListener('livewire:navigated', () => initializeBootstrapComponents());
        });
    })();
</script>
</body>
</html>
