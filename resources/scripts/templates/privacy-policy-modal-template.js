export const getPrivacyPolicyModaltemplate = () => `
  <section class="modal" onclick="window.closeModal(event, this)">
    <div class="modal__container modal__container--wide">
      <div class="modal__scroll">
        <h1 class="title title--secondary">Privacy Policy</h1>

        <div class="box">
          <p>User Registration on <a href="https://zmquotes.com">zmquotes.com</a></p>
          <p>By registering on the <a href="https://zmquotes.com">zmquotes.com</a> website (hereinafter referred to as the "Service"), the user accepts this Consent to the Processing of Personal Data (hereinafter referred to as "Consent") with the following conditions:</p>
          <section>
            <h2>1. Personal Information</h2>
            <p>1.1. Personal information refers to:</p>
            <p>1.1.1. Information that the User provides about themselves during registration or authorization, as well as in the process of further use of the Service, including the User's personal data.</p>
            <p>1.1.2. Data that is transmitted automatically depending on the settings of the User's software in an anonymized form.</p>
            <p>1.2. At registration, the User is required to specify a username (login), email address, and password. The Service creates a unique identifier for each User. The User's identifier is linked to the User's profile information.</p>
            <p>1.3. The Service does not verify the authenticity of the Personal Information provided and assumes the User acts in good faith and with due diligence, making all necessary efforts to keep such information current and to obtain all necessary consents for data processing in accordance with this Policy.</p>
            <p>1.4. The Service collects and stores data about the User's actions, using cookies.</p>
            <p>1.5. The User acknowledges and accepts the possibility of third-party software being used in the Service, which may result in these third parties receiving and transmitting data.</p>
            <p>1.6. The Service is not responsible for how Personal Information is used by third parties with whom the User interacts within the framework of using the Service.</p>
          </section>
          <section>
            <h2>2.Purposes of Processing Personal Information</h2>
            <p>2.1. The Service may use Personal Information for the following purposes:</p>
            <p>2.1.1. Identification of the user using a login-password combination for the proper functioning of the service.</p>
            <p>2.1.2. Communication with the User for informational services and improving the quality of the service.</p>
            <p>2.1.3. Analyzing user actions to improve the quality of the Service.</p>
            <p>2.1.4. Using anonymized data for targeting advertising and/or informational materials based on age, gender, and other characteristics, including by third-party companies providing advertising material placement services.</p>
          </section>
          <section>
            <h2>3.Requirements for the Protection of Personal Information</h2>
            <p>3.1. The Service stores Personal Information and ensures its protection from unauthorized access and distribution.</p>
            <p>3.2. Personal Information of the User is treated as confidential, except for publicly available information.</p>
            <p>3.3. The Service may transfer Personal Information to third parties in the following cases:</p>
            <p>3.3.1. In connection with the transfer of the Service to the ownership, use, or property of a third party.</p>
            <p>3.3.2. At the request of a court or other authorized state body.</p>
          </section>
          <section>
            <h2>4. Changing Personal Information</h2>
            <p>4.1. The User can independently change their Personal Data in the settings of their personal account.</p>
          </section>
          <section>
            <h2>5. Changes to the Privacy Policy</h2>
            <p>5.1. This Policy may be changed or terminated unilaterally by the Service without prior notice to the User. The new version of the Policy comes into force from the moment it is posted on the Site unless otherwise provided by the new version of the Policy.</p>
          </section>
        </div>
      </div>

      <button class="modal__close" type="button" title="Close window">
        <svg width="11" height="10">
          <use xlink:href="/images/stack.svg#close"/>
        </svg>
      </button>
    </div>
  </section>
`;
