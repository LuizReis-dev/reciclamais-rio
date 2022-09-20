
package api;

import dao.BonificacaoDao;


public class RelatorioBonificacao {
    
    private int id_catador;
    private String nome_catador;
    private int id_material;
    private double total_vendido;
    private double meta_bonificacao_kg;
    private double valor_bonificacao;

    public int getId_catador() {
        return id_catador;
    }

    public void setId_catador(int id_catador) {
        this.id_catador = id_catador;
    }

    public int getId_material() {
        return id_material;
    }

    public void setId_material(int id_material) {
        this.id_material = id_material;
    }

    public double getTotal_vendido() {
        return total_vendido;
    }

    public void setTotal_vendido(double total_vendido) {
        this.total_vendido = total_vendido;
    }

    public double getMeta_bonificacao_kg() {
        return meta_bonificacao_kg;
    }

    public void setMeta_bonificacao_kg(double meta_bonificacao_kg) {
        this.meta_bonificacao_kg = meta_bonificacao_kg;
    }

    public double getValor_bonificacao() {
        return valor_bonificacao;
    }

    public void setValor_bonificacao(double valor_bonificacao) {
        this.valor_bonificacao = valor_bonificacao;
    }

    public String getNome_catador() {
        return nome_catador;
    }

    public void setNome_catador(String nome_catador) {
        this.nome_catador = nome_catador;
    }
    
    public double valorABonificar(){
        return this.getValor_bonificacao() * this.quantidadeBonificacoesMerecidas();
    }
    
    public int quantidadeBonificacoesMerecidas(){
        int bonificacoesRecebidas = BonificacaoDao.totalBonificacaoPorCatador(this.id_catador, this.id_material);
        return (int) (this.total_vendido / this.meta_bonificacao_kg) - bonificacoesRecebidas;
    }
}
