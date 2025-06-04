<?php

            $errors = $_SESSION['contact_form_errors'] ?? [];
            unset($_SESSION['contact_form_errors']);
            $success = $_SESSION['contact_form_success'] ?? false;
            unset($_SESSION['contact_form_success']);

            if ($success): ?>
                <div class="contact__success">
                    <p><?= $success; ?></p>
                </div>
            <?php endif; ?>

            <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="post" novalidate class="form">

                <fieldset class="form__field">
                    <legend class="screenreader__only">Informations de contact</legend>

                    <div>
                        <label for="fullname">'Nom complet<span class="ast" aria-hidden="true"> *</span></label>
                        <input
                                type="text"
                                id="fullname"
                                name="fullname"
                                required
                                autocomplete="name"
                                placeholder="ex: John Doe"
                                class="field__input"
                        />
                        <?php if (isset($errors['fullname'])): ?>
                            <p class="field__error"><?= $errors['fullname']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="email">Adresse email<span class="ast" aria-hidden="true"> *</span></label>
                        <input
                                type="email"
                                id="email"
                                name="email"
                                required
                                autocomplete="email"
                                placeholder="ex: johndoe@email.com"
                                class="field__input"
                        />
                        <?php if (isset($errors['email'])): ?>
                            <p class="field__error"><?= $errors['email']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="subject">L’objet de votre message<span class="ast" aria-hidden="true"> *</span></label>
                        <input
                                type="text"
                                id="subject"
                                name="subject"
                                required
                                class="field__input"
                        />
                        <?php if (isset($errors['subject'])): ?>
                            <p class="field__error"><?= $errors['subject']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="message">Message<span class="ast" aria-hidden="true"> *</span></label>
                        <textarea
                                id="message"
                                name="message"
                                rows="6"
                                required
                                placeholder="Écrivez votre message ici..."
                                class="field__input"
                        ></textarea>
                    </div>
                    <?php if (isset($errors['message'])): ?>
                        <p class="field__error"><?= $errors['message']; ?></p>
                    <?php endif; ?>
                </fieldset>

                <p class="ast__p">Les champs marqués d’un astérisque (<span class="ast">*</span>) sont obligatoires</p>

                <div class="form__submit">
                    <?php wp_nonce_field('dw_contact_form_action', '_contact_nonce'); ?>
                    <input type="hidden" name="action" value="dw_submit_contact_form">
                    <button type="submit" name="contact_form_submit"
                            class="form__submit--btn">Envoyer le message</button>
                </div>
            </form>
