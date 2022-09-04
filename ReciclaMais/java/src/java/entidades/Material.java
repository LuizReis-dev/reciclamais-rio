package entidades;

public class Material {
    
    private int id;
    private String nome; 
    private double metaBonificacaoKg;
    private double valorBonificacao;
    private double precoCompraKg;
    private double precoVendaKg;

    public Material() {
    }

    public Material(int id, String nome, double metaBonificacaoKg, double valorBonificacao, double precoCompraKg, double precoVendaKg) {
        this.id = id;
        this.nome = nome;
        this.metaBonificacaoKg = metaBonificacaoKg;
        this.valorBonificacao = valorBonificacao;
        this.precoCompraKg = precoCompraKg;
        this.precoVendaKg = precoVendaKg;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public double getMetaBonificacaoKg() {
        return metaBonificacaoKg;
    }

    public void setMetaBonificacaoKg(double metaBonificacaoKg) {
        this.metaBonificacaoKg = metaBonificacaoKg;
    }

    public double getValorBonificacao() {
        return valorBonificacao;
    }

    public void setValorBonificacao(double valorBonificacao) {
        this.valorBonificacao = valorBonificacao;
    }

    public double getPrecoCompraKg() {
        return precoCompraKg;
    }

    public void setPrecoCompraKg(double precoCompraKg) {
        this.precoCompraKg = precoCompraKg;
    }

    public double getPrecoVendaKg() {
        return precoVendaKg;
    }

    public void setPrecoVendaKg(double precoVendaKg) {
        this.precoVendaKg = precoVendaKg;
    }
    
}
