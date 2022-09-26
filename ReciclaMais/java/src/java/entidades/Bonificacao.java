package entidades;

public class Bonificacao {
    private int id;
    private double valor;
    private MateriaisEmOperacaoComercial matEmOp;
    private String status;
    private int quantidadeReferente;

    public Bonificacao() {
    }

    public Bonificacao(int id, double valor, MateriaisEmOperacaoComercial matEmOp, String status, int quantidadeReferente) {
        this.id = id;
        this.valor = valor;
        this.matEmOp = matEmOp;
        this.status = status;
        this.quantidadeReferente = quantidadeReferente;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public double getValor() {
        return valor;
    }

    public void setValor(double valor) {
        this.valor = valor;
    }

    public MateriaisEmOperacaoComercial getMatEmOp() {
        return matEmOp;
    }

    public void setMatEmOp(MateriaisEmOperacaoComercial matEmOp) {
        this.matEmOp = matEmOp;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public int getQuantidadeReferente() {
        return quantidadeReferente;
    }

    public void setQuantidadeReferente(int quantidadeReferente) {
        this.quantidadeReferente = quantidadeReferente;
    }
 
    
}
