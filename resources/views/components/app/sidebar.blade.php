<div>
    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>

    <!-- Sidebar -->
    <div id="sidebar" class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out" :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'" @click.outside="sidebarOpen = false" @keydown.escape.window="sidebarOpen = false" x-cloak="lg">

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('dashboard') }}">
                {{-- <svg width="32" height="32" viewBox="0 0 32 32">
                    <defs>
                        <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                            <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%" />
                            <stop stop-color="#A5B4FC" offset="100%" />
                        </linearGradient>
                        <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                            <stop stop-color="#38BDF8" stop-opacity="0" offset="0%" />
                            <stop stop-color="#38BDF8" offset="100%" />
                        </linearGradient>
                    </defs>
                    <rect fill="#6366F1" width="32" height="32" rx="16" />
                    <path d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z" fill="#4F46E5" />
                    <path d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z" fill="url(#logo-a)" />
                    <path d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z" fill="url(#logo-b)" />
                </svg> --}}

                <svg width="32" height="32" viewBox="0 0 32 32" fill="white" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <circle cx="16" cy="16" r="16" fill="url(#pattern0)"/>
                    <defs>
                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_146_265" transform="scale(0.00390625)"/>
                    </pattern>
                    <image id="image0_146_265" width="256" height="256" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQAAAAEACAYAAABccqhmAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEwAACxMBAJqcGAAAIABJREFUeJztnc9u28j257+nfK/kXTQrWd5IjdmM3A1EeYKwn6Ddu9lFWQwGsQO08gRR9gNYAWxrdlFWM4sBWn6Clp/AMuA28VsMrrRpxauxd5YuVGcWpNxOYlsiWSSL1PngdgO3bRZLFuvLU6fOH0AQBEEQBEEQhDWC0p6AkDzVg7PS7eZmY/H/N+bz67/e/jRMc05COogArAGVoz93mcgBwyGi54/+IvMNEwYEDDRR/+pNfZTcLIU0EAHIKeWuW1MabYB3QfQszBjMfM5Mnau39Z7Z2Qm2IAKQM6oHZ6VZYbMDwiuDw461RluEIH+IAOSIytGfuwD1wr7xV+BUE5qyNcgPIgA5oXLk9gy/9R+G+UYr2r16Ux/Efi8hdkQAMk714Kw0LRQHTzr3YkBrvJYtQfYRAcgwaS3+BSIC2UelPQEhPLPCZmfpsR74I+n5i8lenRb/FKa3/wmsfwVwGuX+SuHT9uFFY/lvCrYiFkBGqRxftgA6eOznDP5YnE7b43cvrp8ap9x1HdL8tJA8BfNNYTatLbuPYCciABnEO+Pn4WPe/qCmedStBINPvuzt7Ia5VkgX2QJkEMV49KgvzL58/O7FdXE2dZj5PMx8CPRLues6Ya4V0kUEIGP4C+3lQz9j8ElYp9z43YtrxboZdl6K0Q57rZAeIgAZg5hbj/2MiR792Sr89fanIRifQ17+UqyA7CECkCHKXbdGoF8e+hkzn5uI0COed8JeqzSaUe8vJIsIQIZQzI862gjUN3GPSGnBhFfVg7OSiXkIySACkCnoCU+7NpnPHzo+YFYoOAbnIcSMCEC2eND5BwBaKUvO4ZUEBmUIEYCMsCziTmlth+lNcNKegrA6/0h7Allh+/CiMd/YKCnmBpi+X2zE15poCGAUR7qsd+/Hf85EDgAjfgA8YWmsQM3QHL6j3HVrAGrLvgMpcbY6IgAPUO66NczhKILD4AYRPWcA3gKkR+InCYsFWjl2x2AMAN2f7P9oZFEqDeepuE3y/AORjgGBRU2BSFSjzuE+3nzULggOeDH2098Bqw1Ujl0w8zmBhpoxwAYGUsfgeyQU2Gf78KKhlWr6C8nkQ2ykmk7lyG2D8P6p39GEn6Pm6VeO3QGiWQCY7NUjP1flQ7epFNow/F0wuK+07omF4LHWAhDjov8OZj5XrJthH7xVBICZz7/s74R2wpW7rqMYf4S9fkEUAdg+vGhoUr0EUpxFDLCGAlA9OCvd/nNzl4hb6eTR87vJ3k7gYJtVBMAbHp8n+/Vm0PGXJRgFIawALMtwjItF8dPNf9/21y2rcW0EoNx1a8TcIkYzxpp5qxFikQZ6Owcc3/BbdzzZq9eCXpRYSbOn8Mqi95iosy7+gtwLQLnrOkqjmfrD9S0hFimrjbMAd1ipgGfl+LIFRtugKJ5O9upOkAusWPzfwvisFXp5r32YWwHw35htRHRoxQrrX4OcElSO3ScOAh/lFOC+Jhpu3t4O//3Pf9bmGxslYt6NxffB+DDZr7dX/fXK0Z+7IPW70TmY5VQT2nkVgtwJQLnr1hSjB5sX/oKA1XRMeOhjJ4CoeT0MiqPUt2SrkcuS6LmJBKwenJUqR25PMf4F2xfJAqJns8JmgLN7NhXoExuF2Wyw6u/OCputjCx+AHipGP+qHLm9PCU85UIAKkdu23uTWLaPXInH8/u/RZOZjL+4YPBJMC/66p/dGgivZoXiqHLkttOeigkyvQXw9/k9xHyGHzdBynjZvA0IEojkB/p8inlKcTP2twWDtCcSlkxaANWDs9LW8WXfPxbL9OIHAKVWL6ShydrSW6dBFkKQz2wxVcX4Y+v4sp/VbUHmBKBy9OfurFAcPVYZJ6O89BNdluIvskj1/OMgiDD5n9VKKyYMBPrF2xZEzqNInMwIwOKtD1K/Z8hxtDJPVfv5Fk12vT0ZfBLo7R/gs2YGomcg9XvWrIFMCEBO3/pfwbz6ovaOovhdfLMJAPNNcTptBrvELgEzSdasAaudgNWDs9K0WGwT6Le055IEmvBDkHNmGyLoSM9fBEmm8eM0/hXnnGxh1e5MaWKtBbB9eNGYFoqDdVn8QHDTuDC7bYVt5mECrfE6aCZdLs3/RyDQb9NCcWBz/0QrBaB86DaZVGpdb9MiqGkctaNPFMJ2Bs6z+f8QRPScSQ3Kh24z7bk8hHVbgK3jy846vfW/Jeg2YEFi2wHmG61oN8zZ9zqZ/w/B4I9f9nasCn6yxgKoHpyVto4uh+u8+IHwJvJkv97UGq/BfGN6Tvc41YoaYQNf1sn8fwgC/bZ1dDm06ZTACgHYPrxozArF0bqZ/A8RxUS+elvvFWbTWoT2Xo8x1hqvJ3t1J0oyzLqZ/w9BRM9nheLIFr9A6luA8qHbVMSdPJ7thyWoZ/0hto8v/yuD/lfUuTDzf3zZ3/kvUccJUc8g3zDfaKZW1FqRUUnVAqgcuW2l8EkW/9cwbUTeJ86JvpiYCxkax8RnyhVEz5TCp7STilITAN9ptbzG3TqSsx571YOzUtrxCtZCeF85cntp3T5xAagenJUqx+5AHoinmRaL7SjXb97eWlPpNupnyT2EV5Vjd5CG6CcqANWDs9K0UBwgR4kgcUGg36I4imyJPts+vGis+8nOirycFoqJi0BiAnAX2See/pXRpHppz4HBkSwJGz5DViCi50lHDiYiANuHF411jOyLChE9T3N/CADEFNqSqBy5STT4yBWLyMGkRCD2Y8DF4hdPfwQYnwuz29aqZr0Xcce7JppsMPN/EOF/aqL+qjEAXrHPzY74eSLAfEOsnbi7FsUqADkp+2QLT/YY9M7ZlcOMZlxvXWY+J0KPtB489mDG1NNvbQmbc7EqsQmALP6YYL4B0RCMEROXCFQCcyNxC8ufB4OviekahFoq81gD4hSBWAQgrR5vgpBfwvWUXIZxAbChSIUg5JKQjV+fwqgAyOIXhJgxLAJGBGAR4CNHPoIQP8x8XpxNHRPBXpEFoNx1a6S5L4tfEJKDmc/ZK8wyijJOJAGQM35BSBEDsQKhIwHLh26T1caZLH5BSAmiZ6w2zqLUGwwlAFvHlx054xcEO1AKn7aOL0MdEQbaAoizTxDsJYxzcGUL4K47jyx+QbCSRb3BIF2JlloA69adRxDywKpdiZ4UgHLXdRSjB0nsEIQsMtaE5lNl3B8UAHnrC0J+eMoa+E4ApEy3IOSQR8qQ3wmA5HHnEMYVCOVoY/D/BdF/NjQjIX2+qitBfsOGPmTh5wuvRdj/BtF/jzjQfwPjf4hFmDvGpOe7yi/aKIs/Z2imFhC9qUdhOv0/3lhCzqhqUj0l5/r5w2QFmfG7F9dXb+s9rfHaxHiCPRDRcyuagwrmiKt8lIhAPlExt5MWEiTuApIiAjmD+UYxYZD2PISIMN+A9a9JdJq9elvvgfWv8uLIPkwYKNbUT3siQniY+ZxYO5P9HxP7Hif7P/aJtcPM50ndUzAPa+or/60xTnsyQggYH77s7zTibh7xEH+9/Wn4ZX+nAcaHpO8tGGF89bbe85yArOWYJ1uckp6/mOzX22lPZLJfb5OevwBwmvZchAD4a14BnknH4I/pzkhYgVNN+HmyV1+pDJRmjBKYE/56+9Nwsld3NOFniBBYD4M/LraMd8eAX/Z2WmLOGYb5Rmu8jrgwxgz+SHr+YrJXd57K7PqOjWQEYMHVm/pgsld3SM9f+C+UsFvLU034WWu8Fmejafjdl72dO4v/+2QgSQE2xamfijla/AeviOrGLggOM5e+CsJatPwCAMYA0EOt1DBK1Vf/u/wj9CcAxpO9ei3C9V6jUq0bgGqA4ADAty3EvJ6DdA3GgHjev2/deI1O0QPwMso8hIdTgx+tB+AnBzUhf/hgMN+A0I6jjVNQDAjA6WSv7piaTxQqx5ctMNqSkxCYU63Re+yIeGlFoHLXrWEORxEcBjckdPhxGHzCRK2otdpNkScBAPweFMwdAv2S9lxshZnPCTTUjAE2MFj2LIbqC1DuujUAtWW/t3l7Oxy/e3Gd95ZhfpOGVqD9eQLkTQAWlLuuQ5o7uX4Z+S3AqgdnpdvNzcYKV4zCvHhiaw9+n+rBWWlWKI5yaL59lVttG3kVgAW5rWHBfFOYTWsmWn8tI5FkoPG7F9da0cqVSmPH8yyHPq5i5nOt8XqyV6/ZuvjXgau39d5kr17TGq8jRiWe2nTaoBXtJrH4gYQEAPCOiNJOJGHwidZ4PdnfKU326g4YnwMO8FkTfv6yv9OQhW8PV2/rvS/7Ow1N+DnMdzrZqzuT/Z2S1njN4JOYprkSWuN1klvJRLYA9/ErEHWQ0OkCg09YU3/z37f9h1R1iRk5BmOgGYPHrreZvG8BHqN6cFa6/efmriI4/tHjg9/tY9u3xfWkeDdBh+Mp6Xkr6bDuxAVgQbnrOsTciuEPPPbP0ftBEmS+dWwuHJiG55Yo6yoA3/KAIy2Qw8xrtKF2nxCT0PgnR520HMipCcCCr9SW4YRwFI4ZPCRgQFoP0kiMsZnKscsRLs+FAJjEs2CVw4BDoAaCCgLzDRMGT1mlSZK6AHzL4k2smBtgKn37c80YYQOjjfn8Whb7ckQA4mf78KIx39goYY6aogeOx4mvtRflGeqoLk7+kfYEvsX/A40AuwuV3AmV1iVAeeblItTVY5mPYwxgxOAhaxquErSROBzPd1Duuo7ScJi4QaASlv2tvg6THgEY3VtUSDv+IssvIussAJOUu64DAEp/tTBreEilVyNWxyUznzNTx+QJQyQLgPHBVMqxH8XXIkYz5niQMRAuCYrBQ2K6Bv62NGHhW9skuREAL2mEd0PvzexiDNYtE1V+0haAHLWZO/UEggeF2WyQ9t7dFJkWAC/TDE0Qmsj2gn8YPxw0yhBpCkCem84w+ISYe0mWYouDTJYFL3fdWuXI7SnGv0B4jxw+YAAAwqvKkdtLexph8FKf1QA5/W4I9AtI/V45dkflQ7eZ9nzCkjkBqBxftpTmYZ6Ti77CE4F22tMIQvXgrMSkBjnM/XiIqlL4tHV0Odw+vFglaccqMiMA1YOzUuXYHQB0sCYP1t8Q3i8cmllgWiz21u07IqLnTGqQNWsgEwJQPTgrTQvFAda4OIlitNOewyqUu66ztvn6RM+Uwqet48vUi8GsivUCsFj8uc79Xo2XYUzMpGv3K41mkvezEQL9lhURsF4AZPH/DdNG4PLtRJTYcVX14Ky0Nr6ZJRDotyxsB6wWgK3jy3xXfQnK15GGsRO0rPisUHDimUk2UcQd2x2D1gqAv5fMevCIaZI9UgtcVlxZ/bAnDtEzP/XdWqwVgKw4vZImS6cBAgDgpc1bASsFwH/I19bjL+QLv+CMlVgpAMQsvQofIe3MNyEUVVstN+sEoNx1a2t7jrwcy7s468ymxcaNrcej1tUDwBxOjLJ0+mCOu+ddr8H2uHWvRZa1TPZ/7FeOLm9sjwJcNM/A92nDtTjKfvl3tacq9j2sEwBSvGs6SZHBH4vTaXtZCuf9LkgA71r1IHu14q32KHtQB8D7tGdxH2Y+B2HARP1VtlCxNB4herZ9eNGwrXiIfQLg5fKbgflGK9q9erMzWOXX/cIPPf+fv4tBWiAGmqkVJgedwdeUYNb3ZL/e3jq63E07fsNrOIqeJupf7e2Mglzri0TDdEcrVsoBIAKwBGPml7f4wzvN/FzvPpCyGDA+h60SRExDEBL1qbCiXdI8TEE0x2D0tEIv6KJ/iMl+vbl1fFky5ZPiFdrpJY1VArB9eNGIUsHyKxgfrvbMecwXYmCginEgGPzxy/5Opk5Frt7UR9uHF46G6sVtCSzMe6V1Lw7zujidNk21tTNq3RrCKgGYb2yUlCEFKMxuY9kv+2Z4D3FvE5hvAG5+SbHiTBTr6a+3Pw2rB2fOrLDZMZ0fEMW8D8r43YvrrePLHgG5jEq1SgBMwcznSdVsu79NKB+6zcjdZJhvAOoUZtNO1uvO+fNvlrtuz4/sjBLcNWZwX2ndmyTsSGOiPrEIQGZIMgPuPv4+vRdmm/B3C7Np6s0iTONbEs6iMjAYzopbg7tFb5v3PC/kUgCY+buGIkny7TbBq49Hte+TZfSQmEfr8nD7pywt4O92XQ81gNEKgzy0ZssCVgnA5u3tcFbcjDwOET2vHpyVbHmA/AU+hL9VEO5EcgDLG8AAALGZ2BQGW/E83seqUGCTC3ZWLDZNjSWsNwQyEsVHTNZZelYJgM+pmWGoVT04S3UrIGQfP5XXUGyKfbkS1gkAg039karTYrFtaCxhDakenJUUsbHjZK2UCMAyiHlgbCzQb7amYSaHfW+drGCyvDkzn9vYY9A6AZjs/9j3zsLNoDT3ba/LFidaKescT1lg6/iyYzItncjOTE7rBAAA2OQfi+gZkxqIPyAYSZcTt4nyods0XY9SE1l5AmSpAJDZMF6iZ7PiZiZbN6VFWsFUaVM+dJtK4ZPRQRmfbTT/AUsF4OpNfQTGZ8PDVpnUQERAeIzKkdszvvgBaKkJGByt0DbpCwBwtx2wuUqrkDx3fSdjaGrC4I+2vv0BiwXg6k19BIpBOf3+bZUjtyd+AaHcdZ1ZcXOIeKpQj4vTaTuGcY1hrQAAwGRvp8Pgk1gGJ7yaFTeHcky4vlSO3LZi/IGYakFqQtOWcPTHsCoX4CGK02nTV+g4vqSqYvxROXI/F2a3oUpuCdmj3HUd5RVYja8IrOGCNHFhtQUAePkBpOe7xv0B9yG8mhWKo8qR25ZtQX4pd12ncuwO4nzrA15q92S/3o5rfJNYLwCAl02nmeIti0X0DIT3s0JxtHV82Sl33Vqs90uIjfl87a2aytGfu/cWfqwdp5j5vDidNuO8h0mSKxdrgMrxZQugg8RuyPisFXpZ78ZTOXbDFFo7nezVHdNzSYrqwVnJywilFpLq9+BVoW7Y7PX/lkwJAOCd1abQg34McEd7deVHCd87MmEEgMEnX/Z2rGxm8RR3NRqTfkaYb4i1k7XiLpkTACA1EVhwqjV6m/++zUzprlAWAONDVvax24cXDa1U08/bT767U0YXP5CBU4CHmOzXm5UjFymJwEul8HJW3Py0dXx5wpr62MAgi5ZBlil3XYeYdwm0y0A1tTdZhhc/kFEBAFIXAQAAgX4hhV/AwNbR5TmB+lphkHWfAZhvNNMo7WncZ1Fo9a5tG+NZ6gZsxhc/kPpfMDqJOwZXgfmGCQMCBqT1IO0HZNkWYNEsUzMGG5gP054v4DvxCgWHiZwAVYQTg5nPFeumDX+rKGReAAA/g4u4k3b/vke5JwiaaJi0hfCtACy66RDzoDCbDWzwZZS7bk1p3bB1wd+Hmc+Ls6ljw98tKrkQAMAvva02+rC9xfffnDJ4yJqGcfsQKsfuyGuLrvsWLXhHMTcYcPyWWZn43hj88ctetlq1PUVuBADwzMZpsdgzWcklMZhvQDT0F2qu+gUsFjuYGgxu2Px2fxS/VdskxVZtcZArAVhg/ZYgGPcthZHNDkY/erKmNBwmbmTpzb6EU01o5vGkJ5cCAPh7Si/hI9bQzzRYOO0AjAqz21R6CH7V7YjggLmRE8H9G+YbENqTvZ1YGs3aQG4FYEHOrAEPz6nYS6pn3vbhRWOOjQapu7d67kT1AXL71r9P7gUAuPMNtE0XekyBU63R85uQxsLCG3/3Zl+PxX6fsb/wB2lPJAnWQgAWeA832mkGD4WC8Zl43onjbV/uujXM4SiC4y/4POzZg7MG5v5DrJUALPALQrRh+9vNy0ZsmzRDZcF/A/MNQJ20fClps5YCsKDcdR2l0bTOIjC88Bdx87YH2CTKmi/8BWstAAvutgbg3ZSdhcYcT3dpsel/JtsYa412nH6ULCECcI9Uikh4jMG6FTXI5M6ikUX/HQw+YaLOujj3VkUE4BGSKizB4I/F6bQd1gz1rZcmCE2s+37+e8Zg9PyqTqO0J2MjIgBLWKShEnHL8P450nGTv69vZTLsOU68vX0/D6XckkAEIABedCHv+gksoRceg0+K02momvF+77o25G1/n/Ei2SlvsfpxIwIQkq8KVAQ6TuN3Yc6aZeF/jR8O3See9/OSNJUGIgCG8NKRlcOAQwznOyecVzF2N6hZKgvfw8YaBnlABCAmFvHzvoVQIz1vBXlTJdK9xlbupUZrhcHm7e1QFnw8iABYRqZrGoTh/mJnjKTAarKIAFhELjMX7+Gb8SNiGmqFAYCRLPZ0EQGwgLy99e8v9LxVN8obIgApk8FahnfIQs8+me0LkAfKh26TiTsArDb571cgkoWeL8QCSAn/eO9T2vP4ihwXJhUeRgQgBWxZ/Pcbgoj3fT0RAUiYVBf/Ik5eFrzgIwKQIKksfn/R2xgnXz04K91ubjbuegYQl8LmSAjhECdgQviRfYktfgafEHPPlkV/LzKy5udO1GZAVTEAkP8/wqy42QfgpDnXdUIsgATwGl0WR4kE+MRQRzAI9/sFMHEDjFrQNOq8td+yGRGABKgcuwPEXYCU8bkwu20lZT6Xu66DOWqKUAu70J9CE36WfP74kS1AzHjty+Nb/H6pq9bVXsJv/Dlqi7Bl8k14kyjN/erBWU38AfEiFkCMxGr6x9CscrFPB4BVimbG3XBFtgLxIwIQI5UjtxdHTcEoFYXu80QNg9PJXt1ZdRyvfiL14hA6TfhBjivjQ7YAMVHuujVwDAVFGR++7O+0w15+r9ipw37+Ad39KxyT/R/75a7bIM19030HvHLtaJocU/gblfYE8or/4BpFa7ye7NcDj1s9OCttHV92KkeX1yD1u2+VGE0+unpTHxVnU4eZz02OC8Irv+24EAMiADFQPTgrmTb9GfwxSjMLAv0W9zHk+N2L6+Js6gAYmxw3DjEVPEQAYsBrLmKU0yjOsCQ96eN3L65Jz3fNjsqGxxMWiADEALPBPSvzjaaE98CMUZTL/3r70xCMD4ZmAxA983wXgmlEAAxT7rpGA2IA6qTgBY98v8LstuMdVZpCiQDEgAiAaeZm49gLs9tM9qv3th1kcO6yDYgDEQDDKDInAAw+yXIknFboGRuM6Nn24UXD2HgCABEA4zDY2EPKmqzI5AuLv3UxdiKwiFIUzCECYBij+/+N6HvxtGGwsZJiilAzNZbgIQJgENMBK3nIhvMqBpsaTOoEmEYEwCy1tCcgCEEQAbCY6sFZydhgRo/khLwgAmAxt5ub5pxeZNAUDwCTOaeoYB4RAItRnP3FQyz7dpsRATDIxnxu9MzeaEhxAPzGnZHZPrxo5LXRaV4QATCI6S46RPQ8y8EvTBtGq/mYPFIUPEQAzGM0FZbVRiZDgctdt2Y8JVqn48fIMyIApmEz5vM9XmYxE06xwTBgnw3MRQAMIwJgHB1D+C71srQVqBy5bZivhDyWRqXmEQEwTGE2Gxg/cyd6pkn1jMYFxET50G2C8N70uAzOdF6ErYgAGMZPgzX+sBLR82mhOLDZEoiz9yGTydRiYYEIQAxoFU8NOyJ6zqQG5a7rBL22ML3dBeNDHBGB1YOzUuXI7cW2+MEnUho8HkQAYuDqTX0ExudYBid6phh/+PvslRm/e3E92a+3C7NpzWS5ru3Di8a0UBzE0f9ggdK6HdfY644IQExohXas8feE91tHl8OgGYgLIdCEH6KKVOX4ssWkBqZ7AXwF47M4/+JDBCAmrt7UR6B4y1kT0XOleRjUGgC8+U32682HhGDz9vbJBbd9eNHwGp7SQayRfsw3hdmttAaLEWkNFjOJdAYGwMznrKgVtoZAuevWlEYbhFeTvfqDz4XX63CzFYeX/0FY/2qy96HwPSIAMRNrg9CHiNgmvNx1aw853HwPfxuGOwo9hjQGTQYRgATYPrxoMKlBciLANwB1CrPbTtSiouWu6yhGGwlYMQsYfPJlbydz0Y9ZRHwACeA5sbiZ2A2JnoHwflYojsqHbnL3NQAznxen02ba81gXxAJIkDgDZZYw1hrtKL0Fk7AEmPm8OJs6WS6FnjVEABImRREATAhBTL4AWfzpIAKQAon7BL7HjBAQd4x8hoiOSyE8IgApsX140dCkerEG0SwnkhDcHQuCW6GFgPFhsl9vh7pWiIwIQIpUD85K02KxR6BfUp7KGKxbYc/cy123RsydQJ+D+Qbgppzzp4sIgAVUji9bAB2kPQ8Ap5rQDhtM5BUuod4ya8APWtqVBJ/0EQGwBEu2BAtOSc9bYWLwl1o1YvJbhQiAZVSO3HZiobbLYHzWCu0wb+pvrRpmPlesm5LYYxciABayfXjR8IuBJhZ99yQhhcD/HH0wevLWtxMRAIsxetQWFYPhxYI9iABYTuIZeMtgvtFMrSgxBII9iABkhPvpumnPBZA9fV4QAcgYtgmBePWzjQhARkkjTfcx5Fw/u4gAZBxrLALmG2LtyJYgW4gA5AQrhEDCezOHCEDO8IWgGSlBJyKk5y/EEsgGIgA5pXpwVpoVi02AWkiojt8dsh3IDCIAllM9OCtFruvnFfFoIsm6flLgIxOIAFjMvYrCwyhZegvKXddRGs2k/ARS2dd+RAAspnLk9r5ZrJHSdRfcOQzBu3H7CTTh56jzFeJDBMBS/HP+Px75sREhSMJPwMznX/Z3rO1ovO6IAFjKih2FTsG6Y+LYLc7tgdZ4LbkDdiICYCF+Gu1ZgEsiF/lcYKTO3/ecTvbqjqGxBIOIAFjIA3v/1TCcsmsyHVkTfpBQYfuQzkBWwuHaYi06AhU3h9WDs1LUWVy9rfcKs2mNwR+jjqU45GcSYkUEwDK2Dy8aUd64zHxemN42TJ2/j9+9uP6yt9MC6189CyMsJAJgISIAljHHRmiP+bLgm+3Di9BjT/Z/7BNrJ+z1YJaTAAsRAbAMRaiFupD5ZlnkHauNTuXYHVWO3HaYLYLf5PRdqPnZUNZM+A4RAPuohblIM63aWqvq+wn+X+XI7ZW7rhPkPpO9nQ6AcZg5Br2XED8iALYRxgJgvgl1BEh4pRh/VI7dUeVkF4p+AAADCklEQVT4srWqVaA12oHvJViJCIBtMEaBryGKmnVXBehgViiOVvETbGAuWX45QQTAPkaBr2AMjNyZ6Nl8Y2OpFRA2zXfz9laEwzJEAGyDOLfps5IabB8iAJahw5nztVV+iWFGXEIGGZ2auLdgFhEAywiV4UdwVvo1XiIujA+rmOmzQmGl+309NIv5byEiABbC4JOAl1QjHrGdasIPk/16eyUznVTgIh9K616YiQnx8o+0JyB8DzH3QI+0137sGs0dAEGj7cZg3QqSTlzuug44cGmxsdQHtBOxACzEX5CBgm2I6HnlyO2t+vsM/liY3jaCLP7tw4uG0hyi9gB3gl8jJIEIgKWECrYhvFoqAsw3mvDzl72dVSMHAfg1CkgNAof0Mt8UptOn5ySkhgiApfiRfcFDbgmvto4v+w976vWwMJvWgjoaK0d/7oZa/AgUoiykgBQEsZgldQGfxkCXnurBWWlaLLYJ9FvIIaQSkOWIBWAxV2/qg9DFOIiegdTvW8eX/XLXrQW9vHL05+6suDkMvfi9rUYz1LVCYogFkAG2ji6HRPQ87PVBWnWVu25NMXqI2ERECoFmAzkGzADF2dSZFoqDUCLA+LDK4r8rBsp4H2qS39xTFn82EAsgI3jNPHgYyBHHfFOYTWvLnHB+FeI+TPQGYHye7NebkccREkF8ABnh6k19VJhNa8x8vvpVtLQ6cPnQbfolyCMvfgZ/lMWfLUQAMsT43Yvr4mzqrCoCWqH31M/LXddRCp9MzE1rvJY+gNlDtgAZZev4svOUh35ZS657jUej1uobk57vSqhvNhELIKN82dtpacLPeCxYiJ4uLDIrFptRFz+DTwrT24Ys/uwiApBhrt7UB4XpbQOMDw/8ePT01ZHq9I/9cOJdifLLNiIAGWf87sX1ZL/e1oQfwPi8+O8EiqMO/1hrvJ7s1QOHEwt2InEAOcHvu9esHpy1ZsVik5dVCWLdAamVgn0YfELMPRNdiAW7ECfgGlM5vmwB1ML3R4CnDB4S86Awmw3EzBcEQRAEQcgT/x/Ewewv+1eKuQAAAABJRU5ErkJggg=="/>
                    </defs>
                    </svg>
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pages</span>
                </h3>
                <ul class="mt-3">
                    <!-- Dashboard -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['dashboard'])) {{ 'bg-slate-900' }} @endif" x-data="{ open: {{ in_array(Request::segment(1), ['dashboard']) ? 1 : 0 }} }">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['dashboard'])) {{ 'hover:text-slate-200' }} @endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current @if (in_array(Request::segment(1), ['dashboard'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-400' }} @endif" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z" />
                                        <path class="fill-current @if (in_array(Request::segment(1), ['dashboard'])) {{ 'text-indigo-600' }}@else{{ 'text-slate-600' }} @endif" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z" />
                                        <path class="fill-current @if (in_array(Request::segment(1), ['dashboard'])) {{ 'text-indigo-200' }}@else{{ 'text-slate-400' }} @endif" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dashboard</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if (in_array(Request::segment(1), ['dashboard'])) {{ 'rotate-180' }} @endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if (!in_array(Request::segment(1), ['dashboard'])) {{ 'hidden' }} @endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('dashboard')) {{ '!text-indigo-500' }} @endif" href="{{ route('dashboard') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Main</span>
                                    </a>
                                </li>
                                {{-- <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('analytics')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Analytics</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('fintech')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Fintech</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    <!-- Administrador -->
                    @if(auth()->check() && in_array(auth()->user()->tipo, ['A']))
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['administrador'])) {{ 'bg-slate-900' }} @endif" x-data="{ open: {{ in_array(Request::segment(1), ['administrador']) ? 1 : 0 }} }">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'hover:text-slate-200' }} @endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z" />
                                        <path class="fill-current @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'text-indigo-600' }}@else{{ 'text-slate-700' }} @endif" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z" />
                                        <path class="fill-current @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Administrador</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'rotate-180' }} @endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if (!in_array(Request::segment(1), ['ecommerce'])) {{ 'hidden' }} @endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('personal.index')||Route::is('personal.create')||Route::is('personal.edit')) {{ '!text-indigo-500' }} @endif" href="{{ route('personal.index') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Personal</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('servicio.index')||Route::is('servicio.create')||Route::is('servicio.edit')) {{ '!text-indigo-500' }} @endif" href="{{ route('servicio.index') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Servicio</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('turno.index')||Route::is('turno.create')) {{ '!text-indigo-500' }} @endif" href="{{route('turno.index')}}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Turno</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('invoices')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200"></span>
                                    </a>
                                </li>

                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('product')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Paciente</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('shop-2')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pagos</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('shop-2')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Historial</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('estadistica.create')) {{ '!text-indigo-500' }} @endif" href="{{ route('estadistica.create') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Reportes
                                            y Estadisticas</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    <!-- Doctor -->

                    @if(auth()->check() && in_array(auth()->user()->tipo, ['M']))

                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'bg-slate-900' }} @endif" x-data="{ open: {{ in_array(Request::segment(1), ['ecommerce']) ? 1 : 0 }} }">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'hover:text-slate-200' }} @endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z" />
                                        <path class="fill-current @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'text-indigo-600' }}@else{{ 'text-slate-700' }} @endif" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z" />
                                        <path class="fill-current @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Médico</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'rotate-180' }} @endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if (!in_array(Request::segment(1), ['ecommerce'])) {{ 'hidden' }} @endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('orden_index')) {{ '!text-indigo-500' }} @endif" href="{{ route('orden_index') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pagos</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('medico_cita_index')) {{ '!text-indigo-500' }} @endif"
                                        href="{{ route('medico_cita_index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Cita</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('medico_servicio_index')) {{ '!text-indigo-500' }} @endif"
                                        href="{{ route('medico_servicio_index') }}">
                                        <span
                                            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Servicio</span>
                                    </a>
                                </li>
                                {{-- <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('shop')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Turno</span>
                                    </a>
                                </li> --}}
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('medico_paciente_index')) {{ '!text-indigo-500' }} @endif" href="{{ route('medico_paciente_index') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Paciente</span>
                                    </a>
                                </li>
                                {{-- <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('shop-2')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pagos</span>
                                    </a>
                                </li> --}}
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('medico_historial_index')) {{ '!text-indigo-500' }} @endif" href="{{ route('medico_historial_index') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Historial</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0" hidden>
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('shop-2')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Reportes
                                            y Estadisticas</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif




                    <!-- Enfermera -->
                    @if(auth()->check() && in_array(auth()->user()->tipo, ['E']))

                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'bg-slate-900' }} @endif" x-data="{ open: {{ in_array(Request::segment(1), ['ecommerce']) ? 1 : 0 }} }">
                        <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'hover:text-slate-200' }} @endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z" />
                                        <path class="fill-current @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'text-indigo-600' }}@else{{ 'text-slate-700' }} @endif" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z" />
                                        <path class="fill-current @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Enfermería</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if (in_array(Request::segment(1), ['ecommerce'])) {{ 'rotate-180' }} @endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if (!in_array(Request::segment(1), ['ecommerce'])) {{ 'hidden' }} @endif" :class="open ? '!block' : 'hidden'">
                                {{-- <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('personal.index')) {{ '!text-indigo-500' }} @endif" href="{{ route('personal.index') }}">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Personal</span>
                                    </a>
                                </li> --}}
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('servicio.index')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Servicio</span>
                                    </a>
                                </li>
                                {{-- </li>LISTAR SERVICIOS QUE TENGA COMO ATENCION=ENFERMERIA --}}
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('invoices')) {{ '!text-indigo-500' }} @endif" href="{{ route('enfermeria.citas.index') }}">

                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Cita</span>
                                    </a>
                                </li>
                                {{-- MOSTRAR TODOS LOS TURNOS QUE ESTAN CON LA ENFERMERA --}}
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('shop')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Turno</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('shop-2')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pagos</span>
                                    </a>
                                </li>
                                {{-- EN HISTORIAL MOSTRAR TODOS LOS HISTORIALES Y EN CADA HISTORIAL VER LOS DATOS DEL PACIENTE --}}
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('shop-2')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Historial</span> 
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif

                    <!-- Community -->
                    {{-- <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['community'])) {{ 'bg-slate-900' }} @endif"
                    x-data="{ open: {{ in_array(Request::segment(1), ['community']) ? 1 : 0 }} }">
                    <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['community'])) {{ 'hover:text-slate-200' }} @endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path class="fill-current @if (in_array(Request::segment(1), ['community'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" d="M18.974 8H22a2 2 0 012 2v6h-2v5a1 1 0 01-1 1h-2a1 1 0 01-1-1v-5h-2v-6a2 2 0 012-2h.974zM20 7a2 2 0 11-.001-3.999A2 2 0 0120 7zM2.974 8H6a2 2 0 012 2v6H6v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5H0v-6a2 2 0 012-2h.974zM4 7a2 2 0 11-.001-3.999A2 2 0 014 7z" />
                                    <path class="fill-current @if (in_array(Request::segment(1), ['community'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z" />
                                </svg>
                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Community</span>
                            </div>
                            <!-- Icon -->
                            <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if (in_array(Request::segment(1), ['community'])) {{ 'rotate-180' }} @endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                        <ul class="pl-9 mt-1 @if (!in_array(Request::segment(1), ['community'])) {{ 'hidden' }} @endif" :class="open ? '!block' : 'hidden'">
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('users-tabs')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Users
                                        - Tabs</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('users-tiles')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Users
                                        - Tiles</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('profile')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Profile</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('feed')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Feed</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('forum')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Forum</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('forum-post')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Forum
                                        - Post</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('meetups')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Meetups</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('meetups-post')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Meetups
                                        - Post</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </li> --}}
                    <!-- Finance -->
                    {{-- <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['finance'])) {{ 'bg-slate-900' }} @endif"
                    x-data="{ open: {{ in_array(Request::segment(1), ['finance']) ? 1 : 0 }} }">
                    <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['finance'])) {{ 'hover:text-slate-200' }} @endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path class="fill-current @if (in_array(Request::segment(1), ['finance'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" d="M13 6.068a6.035 6.035 0 0 1 4.932 4.933H24c-.486-5.846-5.154-10.515-11-11v6.067Z" />
                                    <path class="fill-current @if (in_array(Request::segment(1), ['finance'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-700' }} @endif" d="M18.007 13c-.474 2.833-2.919 5-5.864 5a5.888 5.888 0 0 1-3.694-1.304L4 20.731C6.131 22.752 8.992 24 12.143 24c6.232 0 11.35-4.851 11.857-11h-5.993Z" />
                                    <path class="fill-current @if (in_array(Request::segment(1), ['finance'])) {{ 'text-indigo-600' }}@else{{ 'text-slate-600' }} @endif" d="M6.939 15.007A5.861 5.861 0 0 1 6 11.829c0-2.937 2.167-5.376 5-5.85V0C4.85.507 0 5.614 0 11.83c0 2.695.922 5.174 2.456 7.17l4.483-3.993Z" />
                                </svg>
                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Finance</span>
                            </div>
                            <!-- Icon -->
                            <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if (in_array(Request::segment(1), ['finance'])) {{ 'rotate-180' }} @endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                        <ul class="pl-9 mt-1 @if (!in_array(Request::segment(1), ['finance'])) {{ 'hidden' }} @endif" :class="open ? '!block' : 'hidden'">
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('credit-cards')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Cards</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('transactions')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Transactions</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('transaction-details')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Transaction
                                        Details</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </li> --}}
                    <!-- Job Board -->
                    {{-- <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['job'])) {{ 'bg-slate-900' }} @endif"
                    x-data="{ open: {{ in_array(Request::segment(1), ['job']) ? 1 : 0 }} }">
                    <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['job'])) {{ 'hover:text-slate-200' }} @endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path class="fill-current @if (in_array(Request::segment(1), ['job'])) {{ 'text-indigo-600' }}@else{{ 'text-slate-700' }} @endif" d="M4.418 19.612A9.092 9.092 0 0 1 2.59 17.03L.475 19.14c-.848.85-.536 2.395.743 3.673a4.413 4.413 0 0 0 1.677 1.082c.253.086.519.131.787.135.45.011.886-.16 1.208-.474L7 21.44a8.962 8.962 0 0 1-2.582-1.828Z" />
                                    <path class="fill-current @if (in_array(Request::segment(1), ['job'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" d="M10.034 13.997a11.011 11.011 0 0 1-2.551-3.862L4.595 13.02a2.513 2.513 0 0 0-.4 2.645 6.668 6.668 0 0 0 1.64 2.532 5.525 5.525 0 0 0 3.643 1.824 2.1 2.1 0 0 0 1.534-.587l2.883-2.882a11.156 11.156 0 0 1-3.861-2.556Z" />
                                    <path class="fill-current @if (in_array(Request::segment(1), ['job'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" d="M21.554 2.471A8.958 8.958 0 0 0 18.167.276a3.105 3.105 0 0 0-3.295.467L9.715 5.888c-1.41 1.408-.665 4.275 1.733 6.668a8.958 8.958 0 0 0 3.387 2.196c.459.157.94.24 1.425.246a2.559 2.559 0 0 0 1.87-.715l5.156-5.146c1.415-1.406.666-4.273-1.732-6.666Zm.318 5.257c-.148.147-.594.2-1.256-.018A7.037 7.037 0 0 1 18.016 6c-1.73-1.728-2.104-3.475-1.73-3.845a.671.671 0 0 1 .465-.129c.27.008.536.057.79.146a7.07 7.07 0 0 1 2.6 1.711c1.73 1.73 2.105 3.472 1.73 3.846Z" />
                                </svg>
                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Job
                                    Board</span>
                            </div>
                            <!-- Icon -->
                            <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if (in_array(Request::segment(1), ['job'])) {{ 'rotate-180' }} @endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                        <ul class="pl-9 mt-1 @if (!in_array(Request::segment(1), ['job'])) {{ 'hidden' }} @endif" :class="open ? '!block' : 'hidden'">
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('job-listing')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Listing</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('job-post')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Job
                                        Post</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('company-profile')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Company
                                        Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </li> --}}
                    <!-- Tasks -->
                    {{-- <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['tasks'])) {{ 'bg-slate-900' }} @endif"
                    x-data="{ open: {{ in_array(Request::segment(1), ['tasks']) ? 1 : 0 }} }">
                    <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['tasks'])) {{ 'hover:text-slate-200' }} @endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path class="fill-current @if (in_array(Request::segment(1), ['tasks'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" d="M8 1v2H3v19h18V3h-5V1h7v23H1V1z" />
                                    <path class="fill-current @if (in_array(Request::segment(1), ['tasks'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" d="M1 1h22v23H1z" />
                                    <path class="fill-current @if (in_array(Request::segment(1), ['tasks'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" d="M15 10.586L16.414 12 11 17.414 7.586 14 9 12.586l2 2zM5 0h14v4H5z" />
                                </svg>
                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Tasks</span>
                            </div>
                            <!-- Icon -->
                            <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if (in_array(Request::segment(1), ['tasks'])) {{ 'rotate-180' }} @endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                        <ul class="pl-9 mt-1 @if (!in_array(Request::segment(1), ['tasks'])) {{ 'hidden' }} @endif" :class="open ? '!block' : 'hidden'">
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('tasks-kanban')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Kanban</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('tasks-list')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </li> --}}
                    <!-- Messages -->
                    {{-- <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['messages'])) {{ 'bg-slate-900' }} @endif">
                    <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['messages'])) {{ 'hover:text-slate-200' }} @endif" href="#0">
                        <div class="flex items-center justify-between">
                            <div class="grow flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path class="fill-current @if (in_array(Request::segment(1), ['messages'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" d="M14.5 7c4.695 0 8.5 3.184 8.5 7.111 0 1.597-.638 3.067-1.7 4.253V23l-4.108-2.148a10 10 0 01-2.692.37c-4.695 0-8.5-3.184-8.5-7.11C6 10.183 9.805 7 14.5 7z" />
                                    <path class="fill-current @if (in_array(Request::segment(1), ['messages'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" d="M11 1C5.477 1 1 4.582 1 9c0 1.797.75 3.45 2 4.785V19l4.833-2.416C8.829 16.85 9.892 17 11 17c5.523 0 10-3.582 10-8s-4.477-8-10-8z" />
                                </svg>
                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Messages</span>
                            </div>
                            <!-- Badge -->
                            <div class="flex flex-shrink-0 ml-2">
                                <span class="inline-flex items-center justify-center h-5 text-xs font-medium text-white bg-indigo-500 px-2 rounded">4</span>
                            </div>
                        </div>
                    </a>
                    </li> --}}
                    <!-- Inbox -->
                    {{-- <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['inbox'])) {{ 'bg-slate-900' }} @endif">
                    <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['inbox'])) {{ 'hover:text-slate-200' }} @endif" href="#0">
                        <div class="flex items-center">
                            <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                <path class="fill-current @if (in_array(Request::segment(1), ['inbox'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" d="M16 13v4H8v-4H0l3-9h18l3 9h-8Z" />
                                <path class="fill-current @if (in_array(Request::segment(1), ['inbox'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" d="m23.72 12 .229.686A.984.984 0 0 1 24 13v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-8c0-.107.017-.213.051-.314L.28 12H8v4h8v-4H23.72ZM13 0v7h3l-4 5-4-5h3V0h2Z" />
                            </svg>
                            <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Inbox</span>
                        </div>
                    </a>
                    </li> --}}
                    <!-- Calendar -->
                    {{-- <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['calendar'])) {{ 'bg-slate-900' }} @endif">
                    <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['calendar'])) {{ 'hover:text-slate-200' }} @endif" href="#0">
                        <div class="flex items-center">
                            <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                <path class="fill-current @if (in_array(Request::segment(1), ['calendar'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" d="M1 3h22v20H1z" />
                                <path class="fill-current @if (in_array(Request::segment(1), ['calendar'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z" />
                            </svg>
                            <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Calendar</span>
                        </div>
                    </a>
                    </li> --}}
                    <!-- Campaigns -->
                    {{-- <li
                        class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['campaigns'])) {{ 'bg-slate-900' }} @endif">
                    <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['campaigns'])) {{ 'hover:text-slate-200' }} @endif" href="#0">
                        <div class="flex items-center">
                            <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                <path class="fill-current @if (in_array(Request::segment(1), ['campaigns'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" d="M20 7a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 0120 7zM4 23a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 014 23z" />
                                <path class="fill-current @if (in_array(Request::segment(1), ['campaigns'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" d="M17 23a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 010-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1zM7 13a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 112 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z" />
                            </svg>
                            <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Campaigns</span>
                        </div>
                    </a>
                    </li> --}}
                    <!-- Settings -->
                    {{-- <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['settings'])) {{ 'bg-slate-900' }} @endif"
                    x-data="{ open: {{ in_array(Request::segment(1), ['settings']) ? 1 : 0 }} }">
                    <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['settings'])) {{ 'hover:text-slate-200' }} @endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <path class="fill-current @if (in_array(Request::segment(1), ['settings'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" d="M19.714 14.7l-7.007 7.007-1.414-1.414 7.007-7.007c-.195-.4-.298-.84-.3-1.286a3 3 0 113 3 2.969 2.969 0 01-1.286-.3z" />
                                    <path class="fill-current @if (in_array(Request::segment(1), ['settings'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" d="M10.714 18.3c.4-.195.84-.298 1.286-.3a3 3 0 11-3 3c.002-.446.105-.885.3-1.286l-6.007-6.007 1.414-1.414 6.007 6.007z" />
                                    <path class="fill-current @if (in_array(Request::segment(1), ['settings'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" d="M5.7 10.714c.195.4.298.84.3 1.286a3 3 0 11-3-3c.446.002.885.105 1.286.3l7.007-7.007 1.414 1.414L5.7 10.714z" />
                                    <path class="fill-current @if (in_array(Request::segment(1), ['settings'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" d="M19.707 9.292a3.012 3.012 0 00-1.415 1.415L13.286 5.7c-.4.195-.84.298-1.286.3a3 3 0 113-3 2.969 2.969 0 01-.3 1.286l5.007 5.006z" />
                                </svg>
                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Settings</span>
                            </div>
                            <!-- Icon -->
                            <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if (in_array(Request::segment(1), ['settings'])) {{ 'rotate-180' }} @endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                        <ul class="pl-9 mt-1 @if (!in_array(Request::segment(1), ['settings'])) {{ 'hidden' }} @endif" :class="open ? '!block' : 'hidden'">
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('account')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My
                                        Account</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('notifications')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">My
                                        Notifications</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('apps')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Connected
                                        Apps</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('plans')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Plans</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('billing')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Billing
                                        & Invoices</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('feedback')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Give
                                        Feedback</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </li> --}}
                    <!-- Utility -->
                    {{-- <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['utility'])) {{ 'bg-slate-900' }} @endif"
                    x-data="{ open: {{ in_array(Request::segment(1), ['utility']) ? 1 : 0 }} }">
                    <a class="block text-slate-200 hover:text-white truncate transition duration-150 @if (in_array(Request::segment(1), ['utility'])) {{ 'hover:text-slate-200' }} @endif" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                    <circle class="fill-current @if (in_array(Request::segment(1), ['utility'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" cx="18.5" cy="5.5" r="4.5" />
                                    <circle class="fill-current @if (in_array(Request::segment(1), ['utility'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" cx="5.5" cy="5.5" r="4.5" />
                                    <circle class="fill-current @if (in_array(Request::segment(1), ['utility'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" cx="18.5" cy="18.5" r="4.5" />
                                    <circle class="fill-current @if (in_array(Request::segment(1), ['utility'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" cx="5.5" cy="18.5" r="4.5" />
                                </svg>
                                <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Utility</span>
                            </div>
                            <!-- Icon -->
                            <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if (in_array(Request::segment(1), ['utility'])) {{ 'rotate-180' }} @endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                        <ul class="pl-9 mt-1 @if (!in_array(Request::segment(1), ['utility'])) {{ 'hidden' }} @endif" :class="open ? '!block' : 'hidden'">
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('changelog')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Changelog</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('roadmap')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Roadmap</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('faqs')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">FAQs</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('empty-state')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Empty
                                        State</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('404')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">404</span>
                                </a>
                            </li>
                            <li class="mb-1 last:mb-0">
                                <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('knowledge-base')) {{ '!text-indigo-500' }} @endif" href="#0">
                                    <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Knowledge
                                        Base</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </li> --}}
                </ul>
            </div>
            <!-- More group -->
            {{-- <div>
                <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                    <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
                    <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">More</span>
                </h3>
                <ul class="mt-3">
                    <!-- Authentication -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" x-data="{ open: false }">
                        <a class="block text-slate-200 transition duration-150" :class="open ? 'hover:text-slate-200' : 'hover:text-white'" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-slate-600" d="M8.07 16H10V8H8.07a8 8 0 110 8z" />
                                        <path class="fill-current text-slate-400" d="M15 12L8 6v5H0v2h8v5z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Authentication</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" :class="{ 'rotate-180': open }" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1" :class="{ 'hidden': !open }" x-cloak>
                                <li class="mb-1 last:mb-0">
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sign
                                                In</span>
                                        </a>
                                    </form>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Sign
                                                Up</span>
                                        </a>
                                    </form>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Reset
                                                Password</span>
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Onboarding -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0" x-data="{ open: false }">
                        <a class="block text-slate-200 transition duration-150" :class="open ? 'hover:text-slate-200' : 'hover:text-white'" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-slate-600" d="M19 5h1v14h-2V7.414L5.707 19.707 5 19H4V5h2v11.586L18.293 4.293 19 5Z" />
                                        <path class="fill-current text-slate-400" d="M5 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm14 0a4 4 0 1 1 0-8 4 4 0 0 1 0 8ZM5 23a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm14 0a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Onboarding</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" :class="{ 'rotate-180': open }" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if (!in_array(Request::segment(1), ['onboarding'])) {{ 'hidden' }} @endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Step
                                            1</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Step
                                            2</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Step
                                            3</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Step
                                            4</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Components -->
                    <li class="px-3 py-2 rounded-sm mb-0.5 last:mb-0 @if (in_array(Request::segment(1), ['component'])) {{ 'bg-slate-900' }} @endif" x-data="{ open: {{ in_array(Request::segment(1), ['component']) ? 1 : 0 }} }">
                        <a class="block text-slate-200 transition duration-150" :class="open ? 'hover:text-slate-200' : 'hover:text-white'" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <circle class="fill-current @if (in_array(Request::segment(1), ['component'])) {{ 'text-indigo-500' }}@else{{ 'text-slate-600' }} @endif" cx="16" cy="8" r="8" />
                                        <circle class="fill-current @if (in_array(Request::segment(1), ['component'])) {{ 'text-indigo-300' }}@else{{ 'text-slate-400' }} @endif" cx="8" cy="16" r="8" />
                                    </svg>
                                    <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Components</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400" :class="{ 'rotate-180': open }" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                            <ul class="pl-9 mt-1 @if (!in_array(Request::segment(1), ['component'])) {{ 'hidden' }} @endif" :class="open ? '!block' : 'hidden'">
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('button-page')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Button</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('form-page')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Input
                                            Form</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('dropdown-page')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Dropdown</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('alert-page')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Alert
                                            & Banner</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('modal-page')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Modal</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('pagination-page')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Pagination</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('tabs-page')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Tabs</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('breadcrumb-page')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Breadcrumb</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('badge-page')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Badge</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('avatar-page')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Avatar</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('tooltip-page')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Tooltip</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('accordion-page')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Accordion</span>
                                    </a>
                                </li>
                                <li class="mb-1 last:mb-0">
                                    <a class="block text-slate-400 hover:text-slate-200 transition duration-150 truncate @if (Route::is('icons-page')) {{ '!text-indigo-500' }} @endif" href="#0">
                                        <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Icons</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div> --}}
        </div>

        <!-- Expand / collapse button -->
        <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
            <div class="px-3 py-2">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                        <path class="text-slate-400" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z" />
                        <path class="text-slate-600" d="M3 23H1V1h2z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>