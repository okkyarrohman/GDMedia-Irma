<div class="w-full h-72 rounded-xl bg-white shadow-md">
    <a href="{{ $sumber }}" target="_blank">
        <img src="{{ asset('storage/Tutorial/cover/' . $cover) }}" alt="Thumbnail Tutorial {{ $id }}" class="w-full h-40 rounded-t-xl object-cover object-center" />
    </a>
    <div class="p-6">
        <div class="flex items-center justify-between mb-4">
            <p class="w-56 font-semibold text-xl line-clamp-2">{{ $nama }}</p>
            <form method="POST" action="{{ route('tutorial-guru.destroy', $id) }}">
            @csrf
            @method('DELETE')
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="28" viewBox="0 0 25 28" fill="none">
                        <path d="M12.4997 3.25961C12.0149 3.25945 11.542 3.42166 11.1461 3.72389C10.7502 4.02611 10.4509 4.45348 10.2893 4.94711C10.2178 5.15459 10.0736 5.32342 9.88794 5.41717C9.70225 5.51093 9.48987 5.52212 9.29662 5.44831C9.10336 5.37451 8.9447 5.22163 8.85486 5.02264C8.76501 4.82366 8.75118 4.59451 8.81634 4.38461C9.08567 3.56186 9.58455 2.84951 10.2443 2.34567C10.904 1.84184 11.6922 1.57129 12.5002 1.57129C13.3082 1.57129 14.0964 1.84184 14.7561 2.34567C15.4158 2.84951 15.9147 3.56186 16.1841 4.38461C16.2531 4.59571 16.2417 4.82779 16.1523 5.0298C16.063 5.23181 15.9029 5.38721 15.7075 5.4618C15.512 5.53639 15.2971 5.52407 15.1101 5.42755C14.923 5.33103 14.7792 5.15821 14.7101 4.94711C14.5484 4.45357 14.249 4.02629 13.8531 3.72409C13.4573 3.42189 12.9844 3.25962 12.4997 3.25961ZM2.86426 6.91586C2.86426 6.69209 2.94657 6.47748 3.09308 6.31924C3.23959 6.16101 3.43831 6.07211 3.64551 6.07211H21.3538C21.561 6.07211 21.7598 6.16101 21.9063 6.31924C22.0528 6.47748 22.1351 6.69209 22.1351 6.91586C22.1351 7.13964 22.0528 7.35425 21.9063 7.51248C21.7598 7.67072 21.561 7.75961 21.3538 7.75961H3.64551C3.43831 7.75961 3.23959 7.67072 3.09308 7.51248C2.94657 7.35425 2.86426 7.13964 2.86426 6.91586ZM6.16113 9.67211C6.14732 9.44878 6.05193 9.24053 5.89594 9.09316C5.73995 8.94579 5.53615 8.87138 5.32936 8.8863C5.12258 8.90122 4.92975 9.00424 4.79329 9.17271C4.65684 9.34118 4.58794 9.56128 4.60176 9.78461L5.08509 17.6056C5.17363 19.0479 5.24551 20.2134 5.41426 21.1291C5.5903 22.0797 5.88822 22.874 6.50488 23.4961C7.12051 24.1194 7.87467 24.3882 8.7653 24.5131C9.62155 24.6346 10.7028 24.6346 12.0424 24.6346H12.958C14.2965 24.6346 15.3788 24.6346 16.2351 24.5131C17.1247 24.3882 17.8788 24.1194 18.4955 23.4961C19.1111 22.874 19.409 22.0786 19.5851 21.1291C19.7538 20.2134 19.8247 19.0479 19.9143 17.6056L20.3976 9.78461C20.4114 9.56128 20.3425 9.34118 20.2061 9.17271C20.0696 9.00424 19.8768 8.90122 19.67 8.8863C19.4632 8.87138 19.2594 8.94579 19.1034 9.09316C18.9474 9.24053 18.852 9.44878 18.8382 9.67211L18.3591 17.4346C18.2653 18.95 18.1986 20.0052 18.0528 20.7984C17.9101 21.569 17.7122 21.9762 17.4278 22.2642C17.1424 22.5522 16.7528 22.739 16.032 22.8402C15.2893 22.9449 14.3101 22.9471 12.9028 22.9471H12.0965C10.6903 22.9471 9.71113 22.9449 8.96738 22.8402C8.24655 22.739 7.85697 22.5522 7.57155 22.2642C7.28717 21.9762 7.08926 21.569 6.94655 20.7984C6.80072 20.0052 6.73405 18.95 6.6403 17.4346L6.16113 9.67211Z" fill="#E70303"/>
                        <path d="M9.81809 11.7015C10.0242 11.6792 10.23 11.7462 10.3904 11.8877C10.5508 12.0293 10.6525 12.2338 10.6733 12.4563L11.1941 18.0813C11.2094 18.3008 11.1446 18.518 11.0137 18.6867C10.8828 18.8553 10.696 18.962 10.4932 18.984C10.2905 19.006 10.0878 18.9416 9.92836 18.8045C9.76895 18.6674 9.66546 18.4685 9.63996 18.2501L9.11913 12.6251C9.09848 12.4025 9.1605 12.1802 9.29157 12.007C9.42264 11.8338 9.61202 11.7239 9.81809 11.7015ZM15.8816 12.6251C15.8969 12.4056 15.8321 12.1884 15.7012 12.0198C15.5703 11.8511 15.3835 11.7444 15.1807 11.7224C14.978 11.7004 14.7753 11.7648 14.6159 11.9019C14.4565 12.039 14.353 12.238 14.3275 12.4563L13.8066 18.0813C13.7914 18.3008 13.8561 18.518 13.9871 18.6867C14.118 18.8553 14.3048 18.962 14.5075 18.984C14.7103 19.006 14.913 18.9416 15.0724 18.8045C15.2318 18.6674 15.3353 18.4685 15.3608 18.2501L15.8816 12.6251Z" fill="text-red-500"/>
                    </svg>
                </button>
            </form>
        </div>
        <a href="" class="mx-auto block max-w-40 text-center text-xs border-b border-b-black truncate">Sumber : {{ $sumber }}</a>
    </div>
</div>