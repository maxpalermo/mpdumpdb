{**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    Massimiliano Palermo <maxx.palermo@gmail.com>
 * @copyright Since 2016 Massimiliano Palermo
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 *}
<form action="{$action}" method="post">
    <div class="panel">
        <div class="panel-heading">
            <i class="icon icon-cogs"></i>
            <span>Esporta DB</span>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <form-group>
                        <label for="db_version_source">Seleziona la versione del Db da leggere</label>
                        <select name="db_version_source" id="db_version_source" class="form-select">
                            {foreach $db_versions as $key=>$db_version}
                                <option value="{$key}">{$db_version}</option>
                            {/foreach}
                        </select>
                    </form-group>
                </div>
                <div class="col-md-4">
                    <form-group>
                        <label for="db_version_dest">Seleziona la versione del Db da esportare</label>
                        <select name="db_version_dest" id="db_version_dest" class="form-select">
                            {foreach $db_versions as $key=>$db_version}
                                <option value="{$key}">{$db_version}</option>
                            {/foreach}
                        </select>
                    </form-group>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="div table-list panel">
                        <h3>
                            <input type="checkbox" id="check_all_tables" checked>
                            <span>
                                Seleziona le tabelle da esportare
                            </span>
                        </h3>
                        <table class="table table-light table-condensed">
                            <thead>
                                <tr>
                                    <th>Tabella</th>
                                    <th>Azione</th>
                                </tr>
                            <tbody>
                                {if empty($tables_list)}
                                    <tr>
                                        <td colspan="2">Nessuna tabella trovata</td>
                                    </tr>
                                {/if}
                                {foreach $tables_list as $table}
                                    <tr>
                                        <td class="fixed-width-xxl">
                                            <input id="{$table}" class="form-check-input" type="checkbox" name="tables_list[]" value="{$table}" checked>
                                            <label for="{$table}" class="form-check-label">{$table}</label>
                                        </td>
                                        <td class="fixed-width-md">
                                            <div class="btn-group" role="group" aria-label="Button group">
                                                <button type="button" class="btn btn-default btn-small">
                                                    <i class="icon icon-upload"></i>
                                                </button>
                                                <button type="button" class="btn btn-default btn-small">
                                                    <i class="icon icon-search"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer text-center">
            <button class="btn btn-default" type="submit" name="submitExport">
                <i class="process-icon-upload"></i>
                <span>{l s='Esporta' mod='mpdumpdb'}</span>
            </button>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#check_all_tables').on('change', function() {
                $('input[name="tables_list[]"]').prop('checked', $(this).prop('checked'));
            });
        });
    </script>
</form>