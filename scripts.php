<!-- scripts.php -->

<div vw class="enabled">
            <div vw-access-button class="active"></div>
            <div vw-plugin-wrapper>
              <div class="vw-plugin-top-wrapper"></div>
            </div>
          </div>

          <!--vlibras-->
          <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>

          <!--chatbot-->
          <script type="module">
            import Chatbot from "https://cdn.jsdelivr.net/npm/flowise-embed/dist/web.js"
            Chatbot.init({
                chatflowid: "4f520e12-8787-4e1f-93e4-b3b824973cb4",
                apiHost: "https://flowiseai-railway-flowiseai-railway-pr-1-e37f.up.railway.app",
                chatflowConfig: {
                    // topK: 2
                },
                theme: {
                    button: {
                        backgroundColor: "#3B81F6",
                        right: 20,
                        bottom: 20,
                        size: "medium",
                        iconColor: "white",
                        customIconSrc: "https://raw.githubusercontent.com/walkxcode/dashboard-icons/main/svg/google-messages.svg",
                    },
                    chatWindow: {
                        welcomeMessage: "Hello! This is custom welcome message",
                        backgroundColor: "#3f3b3c",
                        height: 700,
                        width: 400,
                        fontSize: 16,
                        poweredByTextColor: "#303235",
                        botMessage: {
                            backgroundColor: "#f7f8ff",
                            textColor: "#303235",
                            showAvatar: true,
                            avatarSrc: "./images/IF.png",
                        },
                        userMessage: {
                            backgroundColor: "#3B81F6",
                            textColor: "#ffffff",
                            showAvatar: true,
                            avatarSrc: "https://raw.githubusercontent.com/zahidkhawaja/langchain-chat-nextjs/main/public/usericon.png",
                        },
                        textInput: {
                            placeholder: "Type your question",
                            backgroundColor: "#ffffff",
                            textColor: "#303235",
                            sendButtonColor: "#3B81F6",
                        }
                    }
                }
            })
        </script>

            <!--showcasebox-->
          <script>
            // rolagem automática do slide
            const slider = document.querySelector('.slider');
            let slideWidth = slider.offsetWidth;
            let currentSlide = 0;
            function nextSlide() {
                currentSlide = (currentSlide + 1) % 4; // número de slides (4)
                slider.scrollTo({
                    left: currentSlide * slideWidth,
                    behavior: 'smooth'
                });
            }
            // intervalo de tempo de rolagem.
            setInterval(nextSlide, 5000); // 3000ms = 3 seg

            //vlibras 2
            new window.VLibras.Widget('https://vlibras.gov.br/app');
          </script>
    </body>
</html>